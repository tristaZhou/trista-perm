<?php namespace Trista\Perm\Traits;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;

trait RoleTrait
{
    public function perms()
    {
        return $this->belongsToMany(Config::get('perm.permission'), Config::get('perm.permission_role_table'),Config::get('perm.permission_foreign_key'),Config::get('perm.role_foreign_key'));
    }

  
    public function users()
    {
        return $this->belongsToMany(Config::get('perm.user'), Config::get('perm.role_user_table'),Config::get('perm.user_foreign_key'),Config::get('perm.role_foreign_key'));
    }

    public function cachedPermissions()
    {
        $cacheKey = 'rbac_permissions_for_role_'.$this->pk;
        return Cache::remember($cacheKey, function () {
            return $this->perms;
        });
    }

    public function savePermissions($inputPermissions)
    {
        if (!empty($inputPermissions)) {
            $this->perms()->sync($inputPermissions);
        } else {
            $this->perms()->detach();
        }
    }


    public function attachPermission($permission)
    {
        if (is_object($permission)) {
            $permission = $permission->getKey();
        }

        if (is_array($permission)) {
            $permission = $permission['id'];
        }

        $this->perms()->attach($permission);
    }

    public function detachPermission($permission)
    {
        if (is_object($permission))
            $permission = $permission->getKey();

        if (is_array($permission))
            $permission = $permission['id'];

        $this->perms()->detach($permission);
    }


    public function attachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->attachPermission($permission);
        }
    }


    public function detachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->detachPermission($permission);
        }
    }
}
