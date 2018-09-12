<?php namespace Trista\Perm\Contracts;

interface RoleInterface
{
    public function users();
    
    public function perms();

    public function attachPermission($permission);

    public function detachPermission($permission);

    public function attachPermissions($permissions);

    public function detachPermissions($permissions);
}
