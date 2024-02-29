<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeEmergencyContact;
use Illuminate\Database\Seeder;

class EmployeeEmergencyContactSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 0; $i < Employee::count(); $i++) {
            \Modules\Employee\Database\Factories\EmployeeEmergencyContactFactory::new()->count(fake()->numberBetween(1, 3))->create();
        }
    }
}
