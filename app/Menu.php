<?php

namespace App;

use Baum\Node;

class Menu extends Node
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'route',
        'description',
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'state',
        'created_by',
        'updated_by',
    ];

    protected $appends = [
        'link'
    ];

    public function getLinkAttribute()
    {
        if ($this->route) {
            return route($this->route);
        }

        if ($this->slug) {
            if (strpos($this->slug, 'https') !== false && strpos($this->slug, 'http') !== false) {
                return $this->slug;
            }

            return $this->slug;
        }

        return '#';
    }
}
