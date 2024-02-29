<?php

namespace Modules\Employee\Database\Seeders;

use Modules\Employee\App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\EmployeeEducation;
use Illuminate\Database\Seeder;

class EmployeeEducationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $employees = Employee::all();
        foreach ($employees as $key) {
            \Modules\Employee\Database\Factories\EmployeeEducationFactory::new()->count(1)->create([
                'employee_id' => $key->id
            ]);
        }
    }
}
