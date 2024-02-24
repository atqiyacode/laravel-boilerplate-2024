<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileAppMenuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => $this->faker->firstName(),
			'name' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'icon' => $this->faker->firstName(),
			'status' => $this->faker->boolean(),
        ];
    }
}
