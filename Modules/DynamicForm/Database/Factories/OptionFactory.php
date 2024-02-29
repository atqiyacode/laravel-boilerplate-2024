<?php

namespace Modules\DynamicForm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    protected $model = \Modules\DynamicForm\App\Models\Option::class;
    public function definition(): array
    {
        return [
            'form_field_id' => createOrRandomFactory(\Modules\DynamicForm\App\Models\FormField::class),
            'value' => $this->faker->firstName(),
        ];
    }
}
