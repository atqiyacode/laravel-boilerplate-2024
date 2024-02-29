<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SampleUserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allRoles = Role::pluck('id')->all();
        // $superadminRole = Role::where('name', 'superadmin')->first();
        // $employeeRole = Role::where('name', 'employee')->first();
        // $applicantRole = Role::where('name', 'applicant')->first();
        // $superadminPermissions = Permission::all();

        $atqiya = new User();
        $atqiya->name = 'suherman atqiya';
        $atqiya->email = 'atqiya@atqiyacode.com';
        $atqiya->username = 'atqiyacode';
        $atqiya->email_verified_at = now();
        $atqiya->password = Hash::make('password');
        $atqiya->save();

        $atqiya->assignRole($allRoles);
        // $atqiya->givePermissionTo($superadminPermissions);


        $demoRole = Role::where('name', 'demo')->first();
        // demo account
        $demo = new User();
        $demo->name = 'demo account';
        $demo->email = 'demo@mail.com';
        $demo->username = 'demo';
        $demo->email_verified_at = now();
        $demo->password = Hash::make('password');
        $demo->save();

        $demo->assignRole([$demoRole]);
    }
}
