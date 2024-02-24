<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeOfActivityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'note' => $this->faker->text(),
			'field_of_work_id' => createOrRandomFactory(\App\Models\FieldOfWork::class),
        ];
    }
}
