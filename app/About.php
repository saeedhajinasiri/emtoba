<?php

namespace App;

use App\Traits\Commentable;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use App\Traits\Likable;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Morilog\Jalali\jDate;

class About extends BaseModel
{
    protected $table = 'about';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'state',
    ];
}
