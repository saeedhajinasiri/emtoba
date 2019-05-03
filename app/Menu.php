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
}
