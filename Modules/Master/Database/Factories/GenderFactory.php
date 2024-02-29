<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
        ];
    }
}
