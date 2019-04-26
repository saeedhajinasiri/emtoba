<?php

namespace App;

use App\Traits\DateMutators;
use App\Traits\Loginable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use DateMutators, Loginable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['state', 'created_by', 'updated_by'];

}
