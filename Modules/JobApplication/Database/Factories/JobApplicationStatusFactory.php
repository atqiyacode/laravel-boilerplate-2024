<?php

namespace Modules\JobApplication\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationStatusFactory extends Factory
{
    protected $model = \Modules\JobApplication\App\Models\JobApplicationStatus::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'description' => $this->faker->text(),
        ];
    }
}
