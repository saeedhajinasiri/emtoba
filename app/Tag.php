<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug'
    ];

    /**
     * The blogs that belong to the tag.
     */
    public function blogs()
    {
        return $this->belongsToMany(Post::class);
    }


    /**
     * The videos that belong to the tag.
     */
    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
}
