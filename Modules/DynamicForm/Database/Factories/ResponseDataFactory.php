<?php

namespace Modules\DynamicForm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseDataFactory extends Factory
{
    protected $model = \Modules\DynamicForm\App\Models\ResponseData::class;
    public function definition(): array
    {
        return [
            'response_id' => createOrRandomFactory(\Modules\DynamicForm\App\Models\Response::class),
            'form_field_id' => createOrRandomFactory(\Modules\DynamicForm\App\Models\FormField::class),
            'option_id' => createOrRandomFactory(\Modules\DynamicForm\App\Models\Option::class),
            'value' => $this->faker->firstName(),
        ];
    }
}
