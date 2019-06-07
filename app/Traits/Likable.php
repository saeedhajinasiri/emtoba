<?php

namespace App\Traits;

use App\Like;

trait Likable
{
    /**
     * The likes that belong to the post.
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function thumbsUp()
    {
        return $this->likes()->thumbsUp();
    }

    public function thumbsDown()
    {
        return $this->likes()->thumbsDown();
    }
}