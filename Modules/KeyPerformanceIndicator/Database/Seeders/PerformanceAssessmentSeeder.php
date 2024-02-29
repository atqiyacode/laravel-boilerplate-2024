<?php

namespace Modules\KeyPerformanceIndicator\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \Modules\KeyPerformanceIndicator\Database\Factories\PerformanceAssessmentFactory::new()->count(10)->create();
    }
}
