<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'    => 'test1',
                'phoneId'    => '111111',
                'remark'    => '账号1',
            ],[
                'name'    => 'test22',
                'phoneId'    => '222222',
                'remark'    => '账号2',
            ]
        ];

        $roles = DB::table('users')->insert($data);

        $data = [
            [
                'name'    => '财务员',
                'display_name'    => 'finance',
                'description'    => '进行订单数据相关操作',
            ],[
                'name'    => '订单员',
                'display_name'    => 'order',
                'description'    => '进行财务相关操作',
            ]
        ];

        $roles = DB::table('roles')->insert($data);

        $data = [
            [
                'user_id'    => 1,
                'role_id'    => 1,
            ],
            [
                'user_id'    => 1,
                'role_id'    => 2,
            ]
        ];

        $rolesUser = DB::table('role_user')->insert($data);

        $data = [
            [
                'name'    => '/index',
                'display_name'    => '首页',
                'description'    => '进行订单数据相关操作',
                'parent_id' => 1,
                'level' => 1
            ],[
                'name'    => '/index/user/list',
                'display_name'    => '用户列表',
                'description'    => '进行财务相关操作',
                'parent_id' => 2,
                'level' => 3
            ]
        ];

        $permissions = DB::table('permissions')->insert($data);

        $data = [
            [
                'permission_id'    => 1,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 2,
                'role_id'    => 1,
            ]

        ];

        $permission_role = DB::table('permission_role')->insert($data);
    }
}
