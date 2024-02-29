<?php

namespace Modules\DynamicForm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormFieldFactory extends Factory
{
    protected $model = \Modules\DynamicForm\App\Models\FormField::class;
    public function definition(): array
    {
        return [
            'form_id' => createOrRandomFactory(\Modules\DynamicForm\App\Models\Form::class),
            'type' => $this->faker->randomElement([
                'text',
                'number',
                'boolean'
            ]),
            'label' => $this->faker->firstName(),
        ];
    }
}
