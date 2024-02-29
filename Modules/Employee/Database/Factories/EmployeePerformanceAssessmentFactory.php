<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePerformanceAssessmentFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeePerformanceAssessment::class;

    public function definition(): array
    {
        return [
            'poin' => $this->faker->numberBetween(10, 100),
            'employee_performance_assessment_id' => createOrRandomFactory(\Modules\Employee\App\Models\EmployeePerformanceAssessment::class),
        ];
    }
}
