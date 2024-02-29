<?php

namespace Modules\MobileApp\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileServerFactory extends Factory
{
    protected $model = \Modules\MobileApp\App\Models\MobileServer::class;

    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['online', 'offline', 'maintenance']),
        ];
    }
}
