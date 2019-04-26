<?php

namespace App;

use App\Traits\DateMutators;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Role extends EntrustRole
{
    use DateMutators;

    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    public function getPermissionListAttribute()
    {
        return $this->permissions->pluck('id')->toArray();
    }

    public function getShowPermissionsAttribute()
    {
        $permissions = $this->permissions()->pluck('name', 'id')->toArray();

        return implode(' , ', $permissions);
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Big block of caching of permissions functionality.
     *
     * @return mixed
     */
    public function cachedPermissions()
    {
        $rolePrimaryKey = $this->primaryKey;
        $cacheKey = 'entrust_permissions_for_role_' . $this->$rolePrimaryKey;

        return Cache::rememberForever($cacheKey, function () {
            return $this->perms()->get();
        });
    }
}
