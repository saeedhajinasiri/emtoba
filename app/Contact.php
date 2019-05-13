<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'content',
        'reply',
        'user_name',
        'user_email',
        'user_phone',
        'user_id',
        'user_ip',
        'department_id',
        'assignee_id',
        'state',
        'created_by',
        'updated_by',
        'read_at',
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

    /**
     * excerpt of content accessor
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        return Str::words(strip_tags($this->attributes['content']), 30);
    }
}
