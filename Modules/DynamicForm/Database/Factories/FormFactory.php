<?php

namespace Modules\DynamicForm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    protected $model = \Modules\DynamicForm\App\Models\Form::class;
    public function definition(): array
    {
        return [
            'project_id' => createOrRandomFactory(\Modules\Project\App\Models\Project::class),
            'title' => $this->faker->firstName(),
            'description' => $this->faker->text(),
        ];
    }
}
