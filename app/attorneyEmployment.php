<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class attorneyEmployment extends Model
{
    use DateMutators;

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
