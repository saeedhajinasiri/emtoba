<?php

namespace App;

use App\Enums\EState;
use App\Traits\DateMutators;
use App\Traits\ModelFunctions;
use Baum\Node;
use Illuminate\Database\Eloquent\Model;

class Location extends Node
{
    use ModelFunctions, DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_fa',
        'title_en',
        'slug',
        'slug_fa',
        'description',
        'type',
        'latitude',
        'longitude',
        'map_zoom',
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'state',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the user that owns the category.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function advertises()
    {
        return $this->hasMany(Advertise::class);
    }

    public function getDashedTitleAttribute()
    {
        if ($this->attributes['depth'] == 0) {
            return $this->title_fa;
        }
        return str_repeat("┃&nbsp;&nbsp;&nbsp;&nbsp;", $this->attributes['depth'] - 1) . "┫ " . $this->title_fa;
    }

    public function getQualifiedNameAttribute()
    {
        return $this->title_fa . ' (' . $this->title_en . ')';
    }
}
