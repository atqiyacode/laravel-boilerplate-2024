<?php

namespace Modules\MobileApp\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileAppMenuFactory extends Factory
{
    protected $model = \Modules\MobileApp\App\Models\MobileAppMenu::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->firstName(),
            'name' => $this->faker->firstName(),
            'description' => $this->faker->text(),
            'icon' => $this->faker->firstName(),
            'status' => $this->faker->boolean(),
        ];
    }
}
