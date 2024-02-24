<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Fetch all permissions and store their IDs
        $allPermissionIds = Permission::pluck('id')->all();

        // Prepare the role data
        $roleData = [
            [
                'guard_name' => 'sanctum',
                'name' => 'superadmin',
                'permission_ids' => $allPermissionIds,
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'developer',
                'permission_ids' => $allPermissionIds,
            ],
            // [
            //     'guard_name' => 'sanctum',
            //     'name' => 'demo',
            //     'permission_ids' => [],
            // ],
            [
                'guard_name' => 'sanctum',
                'name' => 'admin',
                'permission_ids' => [],
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'client',
                'permission_ids' => [],
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'employee',
                'permission_ids' => [],
            ],

            // pelamar
            [
                'guard_name' => 'sanctum',
                'name' => 'applicant',
                'permission_ids' => [],
            ],

            // user pjlp role
            [
                'guard_name' => 'sanctum',
                'name' => 'pjlp',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'pjlp-sdm',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'pjlp-keuangan',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'pjlp-monev',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'pjlp-pelaporan',
                'permission_ids' => [],
            ],

            // uptak role
            [
                'guard_name' => 'sanctum',
                'name' => 'uptak',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'uptak-sdm',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'uptak-keuangan',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'uptak-monev',
                'permission_ids' => [],
            ],

            [
                'guard_name' => 'sanctum',
                'name' => 'uptak-pelaporan',
                'permission_ids' => [],
            ],


        ];

        // Create or update roles along with syncing permissions
        foreach ($roleData as $roleItem) {
            $role = Role::updateOrCreate(
                ['guard_name' => 'sanctum', 'name' => $roleItem['name']]
            );

            // Sync permissions
            $role->syncPermissions($roleItem['permission_ids']);
        }
    }
}
