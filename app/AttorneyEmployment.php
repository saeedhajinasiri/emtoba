<?php

namespace App;

use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AttorneyEmployment extends BaseModel
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
}
