<?php 
namespace Trista\Perm\Traits;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;


trait UserTrait
{
    public function roles()
    {
        return $this->belongsToMany(Config::get('perm.role'), Config::get('perm.role_user_table'),Config::get('perm.role_foreign_key'),Config::get('perm.user_foreign_key'));
    }

    public function cachedRoles()
    {
        $cacheKey = 'perm_roles_for_user_'.$this->pk;
        return Cache::remember($cacheKey,function (){
            return $this->roles;
        });
    }

    public function can($permission){
        foreach ($this->cachedRoles() as $role) {
            foreach ($role->cachedPermissions() as $perm) {
                if ($permission == $perm['name']) {
                    return true;
                }
            }
        }
        return false;
    }

    public function attachRole($role)
    {
        if(is_object($role)) {
            $role = $role->getKey();
        }

        if(is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->detach($role);
    }

    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    public function detachRoles($roles=null)
    {
        if (!$roles) $roles = $this->roles()->get();

        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }

}
