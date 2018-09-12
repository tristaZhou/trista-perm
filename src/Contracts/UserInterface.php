<?php namespace Trista\Perm\Contracts;

interface UserInterface
{
    public function roles();

    public function hasRole($name);

    public function perms($permission);
    
    public function can($permission);

    public function attachRole($role);

    public function detachRole($role);

    public function attachRoles($roles);

    public function detachRoles($roles);
}
