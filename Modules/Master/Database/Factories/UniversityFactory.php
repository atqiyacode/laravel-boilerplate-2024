<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'id_sp' => $this->faker->uuid(),
            'kode_pt' => $this->faker->uuid(),
        ];
    }
}
