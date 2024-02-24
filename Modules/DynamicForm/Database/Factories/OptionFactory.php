<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'form_field_id' => createOrRandomFactory(\App\Models\FormField::class),
			'value' => $this->faker->firstName(),
        ];
    }
}
