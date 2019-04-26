<?php

namespace App;

use App\Traits\DateMutators;
use App\Traits\Likable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Morilog\Jalali\jDate;

class Post extends BaseModel
{
    use Likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'author_id',
        'featured',
        'meta_keywords',
        'meta_description',
        'hits',
        'state',
        'created_by',
        'updated_by',
        'published_at',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('state', 1)->where('published_at', '<', Carbon::now());
    }

    /**
     * Get the category that owns the comment.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::Class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function thumbsUp()
    {
        return $this->likes()->thumbsUp();
    }

    public function thumbsDown()
    {
        return $this->likes()->thumbsDown();
    }

    /**
     * Get all of the owning mediable models.
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get Published At as a Jalali Date
     *
     * @param $value
     * @return string
     */
    public function getPublishedAtAttribute($value)
    {
        return $this->prepareGetDateAttribute($value);
    }

    /**
     * Set Published At To Gregorian Date
     *
     * @param $value
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $this->prepareSetDateAttribute($value, 'Y-m-d H:i:s', new Carbon());
    }

    public function getExcerptAttribute()
    {
        return Str::words(strip_tags($this->attributes['content']), 30);
    }

    public function getImageLinkAttribute()
    {
        if ($this->image) {
            return '/images/post/' . $this->image;
        }

        return '/assets/images/product/1.jpg';
    }

    public function getLinkAttribute()
    {
        return route('site.blog.show', ['id' => $this->id, 'slug' => $this->slug]);
    }
    
    public function withoutTimestamps()
    {
        $this->timestamps = false;
        return $this;
    }

    public function getAuthorNameAttribute()
    {
        if (isset($this->user)) {
            return $this->user->full_name;
        }

        return '';
    }

    public function getJalaliPublishedAtAttribute()
    {
        return jDate::forge($this->getOriginal('published_at'));
    }

    public function scopeValid($query)
    {
        return $query
            ->where('published_at', '<=', Carbon::now())
            ->enabled();
    }

    public static function imagePath()
    {
        return DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . strtolower(class_basename(self::class)) . DIRECTORY_SEPARATOR;
    }
}
