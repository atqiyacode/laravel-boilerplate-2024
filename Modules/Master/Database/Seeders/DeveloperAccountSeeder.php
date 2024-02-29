<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\User\App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DeveloperAccountSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developerRole = Role::where('name', 'superadmin')->first();
        $employeeRole = Role::where('name', 'employee')->first();
        $applicantRole = Role::where('name', 'applicant')->first();
        $developerPermissions = Permission::all();

        DB::beginTransaction();

        try {
            $usersData = [
                // [
                //     'name' => 'yusuf',
                //     'email' => 'yusuf@tricitta.co.id',
                //     'username' => 'yusuf',
                //     'email_verified_at' => now(),
                //     'password' => Hash::make('password'),
                // ],
                [
                    'name' => 'miftahussiriah',
                    'email' => 'meta@tricitta.co.id',
                    'username' => 'meta',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                ],
                // [
                //     'name' => 'andiko',
                //     'email' => 'andiko@tricitta.co.id',
                //     'username' => 'andiko',
                //     'email_verified_at' => now(),
                //     'password' => Hash::make('password'),
                // ],
            ];

            User::insert($usersData);

            $users = User::whereIn('username', ['yusuf', 'meta', 'andiko'])->get();

            $users->each(function ($user) use ($developerRole, $employeeRole, $applicantRole, $developerPermissions) {
                $user->assignRole([$developerRole, $employeeRole, $applicantRole]);
                $user->givePermissionTo($developerPermissions);
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
