<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormFieldFactory extends Factory
{
    public function definition(): array
    {
        return [
            'form_id' => createOrRandomFactory(\App\Models\Form::class),
            'type' => $this->faker->randomElement([
                'text',
                'number',
                'boolean'
            ]),
            'label' => $this->faker->firstName(),
        ];
    }
}
