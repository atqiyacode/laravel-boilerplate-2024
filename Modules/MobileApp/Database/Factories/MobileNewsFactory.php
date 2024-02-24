<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileNewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cover' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->realText(100),
            'status' => $this->faker->boolean(),
        ];
    }
}
