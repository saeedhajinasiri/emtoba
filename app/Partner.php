<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use App\Job;

class Partner extends Model
{
    use DateMutators, ImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'scientific_records',
        'social_records',
        'job_id',
        'row',
        'state',
    ];

    /**
     * Get the jobs that owns the partner.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
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

        return '';
    }
}
