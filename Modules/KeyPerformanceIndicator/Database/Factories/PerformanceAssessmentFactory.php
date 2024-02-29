<?php

namespace Modules\KeyPerformanceIndicator\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerformanceAssessmentFactory extends Factory
{
    protected $model = \Modules\KeyPerformanceIndicator\App\Models\PerformanceAssessment::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'poin' => $this->faker->randomNumber(),
            'note' => $this->faker->text(),
        ];
    }
}
