<?php

namespace App;

use App\Enums\ELinkType;
use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'image',
        'state',
        'created_by',
        'updated_by',
    ];

    public function getImageLinkAttribute()
    {
        if ($this->image) {
            return '/images/testimonial/' . $this->image;
        }

        return '/assets/images/product/1.jpg';
    }
}
