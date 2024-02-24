<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeType;
use Modules\Employee\App\Models\Role;
use Modules\Employee\App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $applicantRole = Role::where('name', 'applicant')->first();
        $employeeRole = Role::where('name', 'employee')->first();
        $uptakRole = Role::where('name', 'uptak')->first();
        $pjlpRole = Role::where('name', 'pjlp')->first();

        $uptakEmployee = EmployeeType::where('name', 'UPTAK')->first();
        $pjlpEmployee = EmployeeType::where('name', 'PJLP')->first();

        // dummy data UPTAK Employee
        for ($i = 0; $i < 10; $i++) {
            $nik = Str::uuid();
            Employee::factory(1)->create([
                'nik' => $nik,
                'employee_type_id' => $uptakEmployee->id
            ]);
            $user = User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'username' => $nik,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
            $user->assignRole([$applicantRole, $employeeRole, $uptakRole]);
        }

        // generate developer employee
        $developers = User::whereIn('username', ['atqiyacode', 'yusuf', 'meta', 'andiko'])->get();
        foreach ($developers as $developer) {
            Employee::factory(1)->create([
                'full_name' => $developer->name,
                'nik' => $developer->username,
                'employee_type_id' => $uptakEmployee->id
            ]);
        }

        // dummy data PJLP Employee
        for ($i = 0; $i < 10; $i++) {
            $nik = Str::uuid();
            Employee::factory(1)->create([
                'nik' => $nik,
                'employee_type_id' => $pjlpEmployee->id
            ]);
            $user = User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'username' => $nik,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
            $user->assignRole([$applicantRole, $employeeRole, $pjlpRole]);
        }
    }
}
