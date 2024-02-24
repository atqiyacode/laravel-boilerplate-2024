<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(),
			'description' => $this->faker->text(),
			'start_date' => $this->faker->dateTime(),
			'end_date' => $this->faker->dateTime(),
			'max_apply' => $this->faker->randomNumber(),
			'status' => $this->faker->boolean(),
        ];
    }
}
