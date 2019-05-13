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
        'state',
    ];


    /**
     * Get the jobs that owns the blogs.
     */
    public function jobs()
    {
        return $this->hasOne(Job::Class);
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
