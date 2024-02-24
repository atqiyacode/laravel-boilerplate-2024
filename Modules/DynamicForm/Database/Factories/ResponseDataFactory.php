<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseDataFactory extends Factory
{
    public function definition(): array
    {
        return [
            'response_id' => createOrRandomFactory(\App\Models\Response::class),
			'form_field_id' => createOrRandomFactory(\App\Models\FormField::class),
			'option_id' => createOrRandomFactory(\App\Models\Option::class),
			'value' => $this->faker->firstName(),
        ];
    }
}
