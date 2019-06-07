<?php

namespace App\Traits;

use App\Comment;

trait Commentable
{
    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}