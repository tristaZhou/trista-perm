<?php
namespace Trista\Perm;

class Perm
{
	public $user;

    public function __construct($user)
    {

        $this->user = $user;

    }

    public function hasRole($role)
    {

        if ($this->user) {

            return $this->user->hasRole($role);
        }

        return false;
    }

    public function can($permission)
    {

        if ($this->user()) {

            return $user->can($permission);

        }

        return false;
    }

    public function getAllRoles()
    {
    	if ($this->user()) {

            return $user->getAllRoles();

        }

        return [];
    }

    public function getAllPermissions()
    {
    	if ($this->user()) {

            return $user->getAllPermissions();

        }

        return [];
    }



    

}
