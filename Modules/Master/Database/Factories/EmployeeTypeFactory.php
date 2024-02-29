<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeTypeFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\EmployeeType::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'status' => $this->faker->boolean(),
        ];
    }
}
