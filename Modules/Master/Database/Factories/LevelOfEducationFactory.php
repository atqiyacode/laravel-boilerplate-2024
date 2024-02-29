<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LevelOfEducationFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\LevelOfEducation::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'status' => $this->faker->boolean(),
        ];
    }
}
