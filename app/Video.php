<?php

namespace App;

use App\Traits\Commentable;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use App\Traits\Likable;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Morilog\Jalali\jDate;

class Video extends BaseModel
{
    use Commentable, Likable, ImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'video_url',
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

    /**
     * Get the category that owns the post.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::Class);
    }

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * is active scope
     *
     * @param $query
     * @return mixed
     */
    public function scopeIsActive($query)
    {
        return $query->where('state', 1)->where('published_at', '<', Carbon::now());
    }

    /**
     * thumbs up likes that related to the post
     *
     * @return mixed
     */
    public function thumbsUp()
    {
        return $this->likes()->thumbsUp();
    }

    /**
     * thumbs down likes that related to the post
     *
     * @return mixed
     */
    public function thumbsDown()
    {
        return $this->likes()->thumbsDown();
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

    /**
     * excerpt of content accessor
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        return Str::words(strip_tags($this->attributes['content']), 30);
    }

    /**
     * image link accessor with default
     *
     * @return string
     */
    public function getImageLinkAttribute()
    {
        if ($this->image) {
            return self::imagePath() . $this->image;
        }

        return '/panel/assets/dist/img/avatar.png';
    }

    /**
     * link accessor
     *
     * @return string
     */
    public function getLinkAttribute()
    {
        return route('site.videos.show', ['id' => $this->id, 'slug' => $this->slug]);
    }

    /**
     * @return $this
     */
    public function withoutTimestamps()
    {
        $this->timestamps = false;
        return $this;
    }

    /**
     * author name accessor
     *
     * @return string
     */
    public function getAuthorNameAttribute()
    {
        if (isset($this->user)) {
            return $this->user->full_name;
        }

        return '';
    }

    /**
     * jalali published at accessor
     *
     * @return jDate
     */
    public function getJalaliPublishedAtAttribute()
    {
        return jDate::forge($this->getOriginal('published_at'));
    }

    /**
     * validity of post scope
     *
     * @param $query
     * @return mixed
     */
    public function scopeValid($query)
    {
        return $query
            ->where('published_at', '<=', Carbon::now())
            ->enabled();
    }
}
