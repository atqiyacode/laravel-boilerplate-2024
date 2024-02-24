<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudyProgramFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'id_prodi' => $this->faker->firstName(),
			'kode_prodi' => $this->faker->firstName(),
        ];
    }
}
