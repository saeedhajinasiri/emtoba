<?php

namespace App;

use App\Traits\DateMutators;
use App\Traits\Image;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait, DateMutators, ImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state',
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'mobile',
        'address',
        'location_id',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the owning loginable models.
     */
    public function loginable()
    {
        return $this->morphTo();
    }

    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the categories for the user.
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get the departments for the user.
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    /**
     * Get the roles for the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check if user has a permission by its name.
     *
     * @param string|array $permission Permission string or array of permissions.
     * @param bool $requireAll All permissions in the array are required.
     *
     * @return bool
     */
    public function can($permission, $requireAll = false)
    {
        if (is_array($permission)) {
            foreach ($permission as $permName) {
                $hasPerm = $this->can($permName);

                if ($hasPerm && !$requireAll) {
                    return true;
                } elseif (!$hasPerm && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the perms were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the perms were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            foreach ($this->cachedRoles() as $role) {
                // Validate against the Permission table
                foreach ($role->cachedPermissions() as $perm) {
                    if (str_is($permission, $perm->name)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * role list accessor
     *
     * @return mixed
     */
    public function getRoleListAttribute()
    {
        return $this->roles()->pluck('id')->toArray();
    }

    /**
     * show roles accessor
     *
     * @return string
     */
    public function getShowRolesAttribute()
    {
        $roles = $this->roles()->pluck('name', 'id')->toArray();

        return implode(' , ', $roles);
    }

    /**
     * Big block of caching of roles functionality.
     *
     * @return mixed
     */
    public function cachedRoles()
    {
        $userPrimaryKey = $this->primaryKey;
        $cacheKey = 'entrust_roles_for_user_' . $this->$userPrimaryKey;

        return Cache::rememberForever($cacheKey, function () {
            return $this->roles()->get();
        });
    }

    /**
     * admin link accessor
     *
     * @return string
     */
    public function getAdminLinkAttribute()
    {
        if ($this->loginable_type == Customer::class) {
            return route('admin.customers.edit', $this->loginable_id);
        }

        return route('admin.admins.edit', $this->loginable_id);
    }

    /**
     * panel link accessor
     *
     * @return string
     */
    public function getPanelLinkAttribute()
    {
        if ($this->loginable_type == Customer::class) {
            return url($this->loginable_type);
        }

        return url('/admin');
    }

    /**
     * avatar link accessor
     *
     * @return string
     */
    public function getAvatarLinkAttribute()
    {
        if ($this->avatar) {
            return self::imagePath() . $this->avatar;
        }

        return '';
    }

    /**
     * the accessor of public profile link accessor
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name;
    }

    /**
     * Get last login at difference for humans accessor
     *
     * @return string
     */
    public function getLastLoginAtDifferenceAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->last_login_at))->diffForHumans();
    }

    /**
     * Get user status icon accessor
     *
     * @return string
     */
    public function getUserStatusIconAttribute()
    {
        $diffMinutes = Carbon::createFromTimeStamp(strtotime($this->last_login_at))->diffInMinutes();

        if ($diffMinutes <= 30) {
            return 'online-status-online';
        } else if ($diffMinutes > 30 && $diffMinutes <= 90) {
            return 'online-status-recent';
        } else {
            return 'online-status-offline';
        }
    }
}
