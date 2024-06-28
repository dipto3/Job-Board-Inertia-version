<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::create(['name' => 'users']);
        // Permission::create(['name' => 'company']);
        // Permission::create(['name' => 'index-company']);
        // Permission::create(['name' => 'edit-company']);
        // Permission::create(['name' => 'delete-company']);
        // Permission::create(['name' => 'candidate']);
        // Permission::create(['name' => 'index-candidate']);
        // Permission::create(['name' => 'edit-candidate']);
        // Permission::create(['name' => 'delete-candidate']);

        // Permission::create(['name' => 'role']);
        // Permission::create(['name' => 'create-role']);
        // Permission::create(['name' => 'index-role']);
        // Permission::create(['name' => 'edit-role']);
        // Permission::create(['name' => 'delete-role']);

        // Permission::create(['name' => 'package']);
        // Permission::create(['name' => 'create-package']);
        // Permission::create(['name' => 'index-package']);
        // Permission::create(['name' => 'edit-package']);
        // Permission::create(['name' => 'delete-package']);

        // Permission::create(['name' => 'category']);
        // Permission::create(['name' => 'create-category']);
        // Permission::create(['name' => 'index-category']);
        // Permission::create(['name' => 'edit-category']);
        // Permission::create(['name' => 'delete-category']);

        // Permission::create(['name' => 'job']);
        // Permission::create(['name' => 'create-job']);
        // Permission::create(['name' => 'index-job']);
        // Permission::create(['name' => 'edit-job']);
        // Permission::create(['name' => 'delete-job']);

        // Permission::create(['name' => 'job']);
        // Permission::create(['name' => 'create-job']);
        // Permission::create(['name' => 'index-job']);
        // Permission::create(['name' => 'edit-job']);
        // Permission::create(['name' => 'delete-job']);

        // Permission::create(['name' => 'subscriber']);
        // Permission::create(['name' => 'index-subscriber']);
        // Permission::create(['name' => 'delete-subscriber']);

        $adminRole = Role::create(['name' => 'Admin']);
        $companyRole = Role::create(['name' => 'Company']);

        $permissions = [
            'user', 'company', 'index-company', 'details-company', 'edit-company', 'delete-company',
            'candidate', 'index-candidate', 'details-candidate', 'edit-candidate', 'delete-candidate',
            'role', 'create-role', 'index-role', 'details-role', 'edit-role', 'delete-role',
            'package', 'create-package', 'index-package', 'edit-package', 'delete-package',
            'category', 'create-category', 'index-category', 'edit-category', 'delete-category',
            'job', 'create-job', 'index-job', 'details-job', 'edit-job', 'delete-job',
            'subscriber', 'index-subscriber', 'delete-subscriber',
        ];

        foreach ($permissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        $adminRole->syncPermissions([
            'user', 'company', 'index-company', 'details-company', 'edit-company', 'delete-company',
            'candidate', 'index-candidate', 'details-candidate', 'edit-candidate', 'delete-candidate',
            'role', 'create-role', 'index-role', 'details-role', 'edit-role', 'delete-role',
            'package', 'create-package', 'index-package', 'edit-package', 'delete-package',
            'category', 'create-category', 'index-category', 'edit-category', 'delete-category',
            'job', 'create-job', 'index-job', 'details-job', 'edit-job', 'delete-job',
            'subscriber', 'index-subscriber', 'delete-subscriber',
        ]);
        $companyRole->syncPermissions([

            'job', 'create-job', 'index-job', 'details-job', 'edit-job', 'delete-job',

        ]);
    }
}
