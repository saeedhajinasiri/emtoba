<?php

namespace App;

use App\Traits\DateMutators;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use DateMutators;

    protected $fillable = ['name', 'display_name', 'description'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function getPrefixAttribute()
    {
        $nameArr = explode('.', $this->name);
        array_pop($nameArr);
        return implode('.', $nameArr);
    }
}
