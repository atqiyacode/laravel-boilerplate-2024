<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFirebaseTokenFactory extends Factory
{
    protected $model = \Modules\User\App\Models\UserFirebaseToken::class;

    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
            'device_token' => $this->faker->firstName(),
        ];
    }
}
