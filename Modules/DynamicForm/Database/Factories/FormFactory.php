<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    public function definition(): array
    {
        return [
            'project_id' => createOrRandomFactory(\App\Models\Project::class),
			'title' => $this->faker->firstName(),
			'description' => $this->faker->text(),
        ];
    }
}
