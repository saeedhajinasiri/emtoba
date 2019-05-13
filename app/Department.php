<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state',
        'title',
        'content',
        'created_by',
        'updated_by'
    ];

    /**
     * Get the users that owns the department.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * excerpt of content accessor
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        return str_limit($this->content, 100);
    }
}
