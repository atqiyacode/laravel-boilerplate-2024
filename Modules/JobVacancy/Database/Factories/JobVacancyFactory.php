<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobVacancyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => $this->faker->firstName(),
			'title' => $this->faker->firstName(),
			'general_qualifications' => $this->faker->text(),
			'job_description' => $this->faker->text(),
			'type' => $this->faker->text(),
			'status' => $this->faker->boolean(),
			'open_date' => $this->faker->dateTime(),
			'close_date' => $this->faker->dateTime(),
			'project_id' => createOrRandomFactory(\App\Models\Project::class),
			'position_id' => createOrRandomFactory(\App\Models\Position::class),
        ];
    }
}
