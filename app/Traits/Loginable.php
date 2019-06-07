<?php

namespace App\Traits;

use App\User;

trait Loginable
{
    public function user()
    {
        return $this->morphOne(User::class, 'loginable');
    }
}