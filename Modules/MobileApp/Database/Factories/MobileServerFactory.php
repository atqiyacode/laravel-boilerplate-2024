<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileServerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['online', 'offline', 'maintenance']),
        ];
    }
}
