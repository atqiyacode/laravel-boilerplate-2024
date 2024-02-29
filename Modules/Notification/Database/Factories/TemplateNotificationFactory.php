<?php

namespace Modules\Notification\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateNotificationFactory extends Factory
{
    protected $model = \Modules\Notification\App\Models\TemplateNotification::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'message' => $this->faker->realText(),
            'image' => $this->faker->imageUrl(),
            'attachment' => $this->faker->uuid(),
            'notification_type_id' => createOrRandomFactory(\Modules\Notification\App\Models\NotificationType::class),
            'user_id' => createOrRandomFactory(\App\Models\User::class),
            'created_at' => $this->faker->dateTimeBetween('-1 week', ''),
        ];
    }
}
