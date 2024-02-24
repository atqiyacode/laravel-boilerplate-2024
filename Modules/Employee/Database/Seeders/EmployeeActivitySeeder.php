<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeActivity;
use Illuminate\Database\Seeder;

class EmployeeActivitySeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $employee_count = Employee::count();
        EmployeeActivity::factory($employee_count * 66)->create();
    }
}
