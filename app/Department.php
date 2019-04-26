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
    protected $fillable = ['state', 'title', 'content', 'created_by', 'updated_by'];

    /**
     * Get the user that owns the department.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function getBriefAttribute()
    {
        return str_limit($this->content, 100);
    }
}
