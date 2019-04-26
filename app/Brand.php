<?php

namespace App;

use App\Traits\DateMutators;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_fa',
        'title_en',
        'slug',
        'content',
        'image',
        'hits',
        'state',
        'created_by',
        'updated_by',
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
        return $this->belongsTo('App\User');
    }

    public function getImageLinkAttribute()
    {
        return '/images/brand/' . $this->image;
    }

    public function getLinkAttribute()
    {
        return route('site.projects.brand', $this->slug);
    }
}
