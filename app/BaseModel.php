<?php

namespace App;

use App\Enums\EState;
use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use DateMutators;

    public function scopeEnabled($query)
    {
        return $query->where('state', EState::enabled);
    }
}
