<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];
}
