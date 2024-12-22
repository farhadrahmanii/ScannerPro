<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['name' => 'user.list', 'guard_name' => 'web', 'group_name' => 'Category'],
            ['name' => 'driver.list', 'guard_name' => 'web', 'group_name' => 'Coupon'],
            ['name' => 'create.driver', 'guard_name' => 'web', 'group_name' => 'Coupon'],
            ['name' => 'driver.edit', 'guard_name' => 'web', 'group_name' => 'Coupon'],
            ['name' => 'view.driver', 'guard_name' => 'web', 'group_name' => 'Coupon'],
            ['name' => 'transaction.view', 'guard_name' => 'web', 'group_name' => 'Report'],
            ['name' => 'transaction.create', 'guard_name' => 'web', 'group_name' => 'Transactions'],
            ['name' => 'transaction.edit', 'guard_name' => 'web', 'group_name' => 'Transactions'],
            ['name' => 'site.list', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'site.create', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'site.edit', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'Permission.list', 'guard_name' => 'web', 'group_name' => 'Role and Permission'],
            ['name' => 'permission.create', 'guard_name' => 'web', 'group_name' => 'Role and Permission'],
            ['name' => 'permission.edit', 'guard_name' => 'web', 'group_name' => 'Role and Permission'],
            ['name' => 'add.vehicle.to.driver', 'guard_name' => 'web', 'group_name' => 'Category'],
            ['name' => 'transaction.list', 'guard_name' => 'web', 'group_name' => 'Transactions'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name'], 'guard_name' => $permission['guard_name']],
                ['group_name' => $permission['group_name']]
            );
        }
    }
}
