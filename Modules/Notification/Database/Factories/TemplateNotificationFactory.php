<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateNotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'message' => $this->faker->realText(),
            'image' => $this->faker->imageUrl(),
            'attachment' => $this->faker->uuid(),
            'notification_type_id' => createOrRandomFactory(\App\Models\NotificationType::class),
            'user_id' => createOrRandomFactory(\App\Models\User::class),
            'created_at' => $this->faker->dateTimeBetween('-1 week', ''),
        ];
    }
}
