<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePerformanceAssessmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'poin' => $this->faker->numberBetween(10, 100),
            'employee_performance_assessment_id' => createOrRandomFactory(\App\Models\EmployeePerformanceAssessment::class),
        ];
    }
}
