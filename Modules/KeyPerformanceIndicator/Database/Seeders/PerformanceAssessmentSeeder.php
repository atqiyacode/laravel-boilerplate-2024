<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\KeyPerformanceIndicator\App\Models\PerformanceAssessment;
use Illuminate\Database\Seeder;

class PerformanceAssessmentSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PerformanceAssessment::factory(10)->create();
    }
}
