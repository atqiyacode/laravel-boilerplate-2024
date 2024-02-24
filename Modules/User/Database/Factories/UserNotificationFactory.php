<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserNotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status' => $this->faker->boolean(),
            'user_id' => createOrRandomFactory(\App\Models\User::class),
            'template_notification_id' => createOrRandomFactory(\App\Models\TemplateNotification::class),
            'created_at' => $this->faker->dateTimeBetween('-1 week', ''),
        ];
    }
}
