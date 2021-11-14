<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Roles

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        //Permission List as array

        $permissions = [

            //Dashboard Permission
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],


            //Blog Permission
            [
                'group_name' => 'product',
                'permissions' => [
                    'product.create',
                    'product.view',
                    'product.edit',
                    'product.delete',
                    'product.approve',
                ]
            ],


            //Admin Permission
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],


            //Role Permission
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],


            //Profile Permission
            [
                'group_name' => 'profile',
                'permissions' => [
                    'profile.view',
                    'profile.edit',
                ]
            ],

        ];


        //create and Assign Permission

        for ($i = 0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                //Create permission
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                ]);

                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
