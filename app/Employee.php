<?php

namespace App;

use App\Enums\EGenderType;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends BaseModel
{
    use DateMutators, ImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_certificate_number',
        'national_code',
        'birth_place',
        'email',
        'phone',
        'gender',
        'mobile',
        'address',
        'image',
        'description',
        'read',
    ];

    public function getGenderNameAttribute()
    {
        return ($this->gender == EGenderType::men ? trans('site.genders.men') : trans('site.genders.women'));
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
