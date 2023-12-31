<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'guard_name'    => 'web',
                'name' => 'user_management_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'permission_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'permission_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'permission_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'permission_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'permission_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'role_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'role_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'role_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'role_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'role_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'user_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'user_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'user_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'user_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'user_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'driver_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'driver_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'driver_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'driver_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'driver_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'audit_log_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'audit_log_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'box_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'box_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'box_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'box_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'box_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_user_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_user_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_user_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_user_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'company_user_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'order_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'order_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'order_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'order_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'order_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_address_create',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_address_edit',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_address_show',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_address_delete',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'client_address_access',
            ],
            [
                'guard_name'    => 'web',
                'name' => 'profile_password_edit',
            ],


        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission['name'])->where('guard_name', $permission['guard_name'])->exists()) {
                Permission::create($permission);
            }
        }
    }
}
