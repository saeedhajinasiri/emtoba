<?php

namespace App;

use App\Reserve;
use App\Traits\DateMutators;
use App\Traits\Loginable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Media extends Model
{
    use DateMutators, Loginable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'disk',
        'url',
        'mime_type',
        'mediable_id',
        'mediable_type',
        'title',
        'description',
        'user_id',
        'created_by',
        'updated_by',
        'state',
        'approved_at',
    ];

    public function scopeIsApproved($query)
    {
        return $this->whereNotNull('approved_at');
    }

    /**
     * Get the comments for the restaurant post.
     */
    public function restaurants()
    {
        return $this->morphMany(Restaurant::class, 'mediable');
    }

    /**
     * Media related user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'user');
    }

    /**
     * Media url accessor
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return starts_with($this->attributes['url'], ['http://', 'https://']) ? $this->attributes['url'] : 'http://' . $this->attributes['url'];
    }

    /**
     * Media thumbnail path accessor
     *
     * @return string
     */
    public function getFullPathAttribute()
    {
        return $this->path . '/' . $this->name;
    }

    /**
     * Image approvement check accessor
     *
     * @return bool
     */
    public function getIsApprovedAttribute()
    {
        return !is_null($this->approved_at);
    }

}
