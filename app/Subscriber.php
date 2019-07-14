<?php

namespace App;

use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
    ];
}
