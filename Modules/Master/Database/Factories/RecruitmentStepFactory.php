<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecruitmentStepFactory extends Factory
{
    public function definition(): array
    {
        return [
            'label' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'icon' => $this->faker->firstName(),
        ];
    }
}
