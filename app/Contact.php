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
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the comment.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * department title accessor
     * @return string
     */
    public function getDepartmentTitleAttribute()
    {
        if ($this->department) {
            return $this->department->title;
        }

        return '';
    }
}
