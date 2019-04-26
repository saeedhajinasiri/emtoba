<?php

namespace App;

use App\Enums\EInventoryStatus;
use App\Traits\DateMutators;
use App\Traits\Likable;
use Carbon\Carbon;

class Project extends BaseModel
{
    use DateMutators, Likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'page_title',
        'slug',
        'content',
        'abstract',
        'video_description',
        'image',
        'video_url',
        'video_cover',
        'author_id',
        'architects',
        'architects_url',
        'location',
        'location_url',
        'employer',
        'project_year',
        'dimension',
        'length',
        'meta_keywords',
        'meta_description',
        'featured',
        'hits',
        'state',
        'created_by',
        'updated_by',
        'published_at',
    ];

    public function withoutTimestamps()
    {
        $this->timestamps = false;
        return $this;
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the brand that owns the comment.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::Class);
    }

    /**
     * Get the category that owns the comment.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::Class);
    }

    /**
     * Get the comments for the project.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the owning mediable models.
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get Discount Expired At as a Jalali Date
     *
     * @param $value
     * @return string
     */
    public function getDiscountExpiredAtAttribute($value)
    {
        return $this->prepareGetDateAttribute($value);
    }

    /**
     * Set Discount Expired At To Gregorian Date
     *
     * @param $value
     */
    public function setDiscountExpiredAtAttribute($value)
    {
        $this->attributes['discount_expired_at'] = $value ? $this->prepareSetDateAttribute($value, 'Y-m-d H:i:s', new Carbon()) : '';
    }

    /**
     * Get Discount Started At as a Jalali Date
     *
     * @param $value
     * @return string
     */
    public function getDiscountStartedAtAttribute($value)
    {
        return $this->prepareGetDateAttribute($value);
    }

    /**
     * Set Discount Started At To Gregorian Date
     *
     * @param $value
     */
    public function setDiscountStartedAtAttribute($value)
    {
        $this->attributes['discount_started_at'] = $value ? $this->prepareSetDateAttribute($value, 'Y-m-d H:i:s', new Carbon()) : '';
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value ? str_replace(',', '', $value) : 0;
    }

    public function setDiscountPriceAttribute($value)
    {
        $this->attributes['discount_price'] = $value ? str_replace(',', '', $value) : 0;
    }

    public function getImageLinkAttribute()
    {
        return '/images/project/' . $this->image;
    }

    public function getVideoCoverLinkAttribute()
    {
        return '/images/project/' . $this->video_cover;
    }

    public function getLinkAttribute()
    {
        return route('site.projects.show', ['id' => $this->id, 'slug' => $this->slug]);
    }

    public function getDecoratePriceAttribute()
    {
        return number_format($this->price) . ' ' . trans('site.toman');
    }

    public function getDecorateDiscountPriceAttribute()
    {
        return number_format($this->discount_price) . ' ' . trans('site.toman');
    }

    public function getFinalPriceAttribute()
    {
        if ($this->hasDiscount()) {
            return $this->discount_price;
        }

        return $this->price;
    }

    public function getFinalDecoratePriceAttribute()
    {
        if ($this->hasDiscount()) {
            return $this->decorate_discount_price;
        }

        return $this->decorate_price;
    }

    public function getDetailsAttribute()
    {
        $html = trans('admin.projects.manufacturing_country'). ': ' . $this->manufacturing_country;
        $html .= ' - ' . trans('admin.projects.model'). ': ' . $this->model;

        return $html;
    }

    public function getInvetoryStatusIconAttribute()
    {
        if ($this->invetory_status == EInventoryStatus::existing) {
            return '<i class="glyphicon-remove-circle glyphicon red fs-18"></i>';
        }

        return '<i class="glyphicon-ok-circle glyphicon green fs-18"></i>';
    }

    public function getPointStarAttribute()
    {
        $html = '';
        for ($i = 1; $i <= $this->point; $i++) {
            $html .= '<i class="fa fa-star"> </i>'; //<i class="fa fa-star-half-o"> </i>
        }

        return $html;
    }

    public function hasDiscount()
    {
        return $this->discount_price && $this->getOriginal('discount_expired_at') >= Carbon::now() && $this->getOriginal('discount_started_at') <= Carbon::now();
    }

    public static function imagePath()
    {
        return DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . strtolower(class_basename(self::class)) . DIRECTORY_SEPARATOR;
    }
}
