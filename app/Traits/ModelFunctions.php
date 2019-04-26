<?php

namespace App\Traits;

trait ModelFunctions
{
    public function scopeEnabled($query)
    {
        return $query->where('state', 1);
    }

    public function scopeDisabled($query)
    {
        return $query->where('state', 0);
    }
}