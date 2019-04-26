<?php

namespace App;

use App\Traits\DateMutators;
use Baum\Node;

class Category extends Node
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_keywords',
        'meta_description',
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

    /**
     * dashed title accessor for using admin dropdown
     *
     * @return mixed|string
     */
    public function getDashedTitleAttribute()
    {
        if ($this->attributes['depth'] == 0) {
            return $this->title;
        }

        return str_repeat("┃&nbsp;&nbsp;&nbsp;&nbsp;", $this->attributes['depth'] - 1) . "┫ " . $this->title;
    }

    /**
     * qualified name accessor
     *
     * @return string
     */
    public function getQualifiedNameAttribute()
    {
        return $this->title_fa . ' (' . $this->title_en . ')';
    }

    /**
     * link accessor
     *
     * @return string
     */
    public function getLinkAttribute()
    {
        return '';
    }
}
