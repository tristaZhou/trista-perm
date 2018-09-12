<?php namespace Trista\Perm\Traits;

use Illuminate\Support\Facades\Config;

trait PermissionTrait
{

    public function roles()
    {
        return $this->belongsToMany(Config::get('perm.role'), Config::get('perm.permission_role_table'),Config::get('perm.role_foreign_key'),Config::get('perm.permission_foreign_key'));
    }
}
