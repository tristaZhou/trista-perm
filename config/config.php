<?php

return [
    'role' => 'App\Role',
    'roles_table' => 'roles',
    'permission' => 'App\Permission',
    'permissions_table' => 'permissions',
    'permission_role_table' => 'permission_role',
    'roles_user_table' => 'roles_user',
    'user_foreign_key' => 'user_id',
    'role_foreign_key' => 'role_id',
    'permission_foreign_key' => 'permission_id'

];
