<?php

namespace App;


use App\Enums\ELikeType;
use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    //Relations

    protected $fillable = [
        'user_id', 'user_ip', 'score_type', 'state'
    ];

    /**
     * Country constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function table()
    {
        return (new self)->getTable();
    }

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
