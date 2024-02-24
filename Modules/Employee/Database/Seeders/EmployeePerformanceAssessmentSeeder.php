<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\EmployeePerformanceAssessment;
use Illuminate\Database\Seeder;

class EmployeePerformanceAssessmentSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        EmployeePerformanceAssessment::factory(10)->create();
    }
}
