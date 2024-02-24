<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FAQFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => $this->faker->firstName(),
			'answer' => $this->faker->text(),
			'status' => $this->faker->boolean(),
        ];
    }
}
