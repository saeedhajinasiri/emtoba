<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'user_id',
        'user_ip',
        'state',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that owns the comment.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function getDepartmentTitleAttribute()
    {
        return Department::find($this->department_id)->first()->toArray()['title'];
    }
}
