<?php

namespace App;

use App\Traits\DateMutators;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'link',
        'content',
        'image',
        'hits',
        'state',
        'created_by',
        'updated_by',
        'published_at',
    ];

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
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

    public function getImageLinkAttribute()
    {
        return '/images/slider/' . $this->image;
    }
}
