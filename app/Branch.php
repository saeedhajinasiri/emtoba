<?php

namespace App;

use App\Enums\ELinkType;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use DateMutators, ImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'tel',
        'fax',
        'website',
        'email',
        'address',
        'image',
        'state',
    ];

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
