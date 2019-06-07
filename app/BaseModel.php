<?php

namespace App;

use App\Enums\EState;
use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use DateMutators;

    /**
     * enabled scope
     *
     * @param $query
     * @return mixed
     */
    public function scopeEnabled($query)
    {
        return $query->where('state', EState::enabled);
    }
}
