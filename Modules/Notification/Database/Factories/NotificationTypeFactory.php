<?php

namespace Modules\Notification\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationTypeFactory extends Factory
{
    protected $model = \Modules\Notification\App\Models\NotificationType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'description' => $this->faker->text(),
            'status' => $this->faker->boolean(),
        ];
    }
}
