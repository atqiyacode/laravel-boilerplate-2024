<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserNotificationFactory extends Factory
{
    protected $model = \Modules\User\App\Models\UserNotification::class;
    public function definition(): array
    {
        return [
            'status' => $this->faker->boolean(),
            'user_id' => createOrRandomFactory(\App\Models\User::class),
            'template_notification_id' => createOrRandomFactory(\Modules\Notification\App\Models\TemplateNotification::class),
            'created_at' => $this->faker->dateTimeBetween('-1 week', ''),
        ];
    }
}
