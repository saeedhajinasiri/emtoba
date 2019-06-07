<?php

namespace App;

use App\Enums\ELikeType;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_ip',
        'score_type',
        'state'
    ];

    /**
     * Get all of the owning likable models.
     */
    public function likable()
    {
        return $this->morphTo('likable');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeThumbsUp($query)
    {
        return $query->where('score_type', ELikeType::thumbs_up);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeThumbsDown($query)
    {
        return $query->where('score_type', ELikeType::thumbs_down);
    }
}
