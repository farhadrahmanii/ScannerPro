<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['name' => 'user.list', 'guard_name' => 'web', 'group_name' => 'HR'],
            ['name' => 'user.create', 'guard_name' => 'web', 'group_name' => 'HR'],
            ['name' => 'user.edit', 'guard_name' => 'web', 'group_name' => 'HR'],
            ['name' => 'user.delete', 'guard_name' => 'web', 'group_name' => 'HR'],
            ['name' => 'driver.list', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'create.driver', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'driver.edit', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'view.driver', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'delete.driver', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'transaction.view', 'guard_name' => 'web', 'group_name' => 'Transactions'],
            ['name' => 'transaction.create', 'guard_name' => 'web', 'group_name' => 'Transactions'],
            ['name' => 'transaction.edit', 'guard_name' => 'web', 'group_name' => 'Transactions'],
            ['name' => 'site.list', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'site.create', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'site.edit', 'guard_name' => 'web', 'group_name' => 'Site Manager'],
            ['name' => 'Permission.list', 'guard_name' => 'web', 'group_name' => 'Role and Permission'],
            ['name' => 'permission.create', 'guard_name' => 'web', 'group_name' => 'Role and Permission'],
            ['name' => 'permission.edit', 'guard_name' => 'web', 'group_name' => 'Role and Permission'],
            ['name' => 'vehicle.list', 'guard_name' => 'web', 'group_name' => 'Vehicle'],
            ['name' => 'add.vehicle.to.driver', 'guard_name' => 'web', 'group_name' => 'driver'],
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
