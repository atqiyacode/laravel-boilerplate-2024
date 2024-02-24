<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TermAndConditionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => $this->faker->text(),
        ];
    }
}
