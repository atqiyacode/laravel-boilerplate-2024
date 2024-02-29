<?php

namespace Modules\MobileApp\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileNewsFactory extends Factory
{
    protected $model = \Modules\MobileApp\App\Models\MobileNews::class;
    public function definition(): array
    {
        return [
            'cover' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->realText(100),
            'status' => $this->faker->boolean(),
        ];
    }
}
