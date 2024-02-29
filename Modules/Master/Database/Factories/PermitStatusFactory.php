<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermitStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'status' => $this->faker->boolean(),
        ];
    }
}
