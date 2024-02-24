<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerformanceAssessmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'poin' => $this->faker->randomNumber(),
			'note' => $this->faker->text(),
        ];
    }
}
