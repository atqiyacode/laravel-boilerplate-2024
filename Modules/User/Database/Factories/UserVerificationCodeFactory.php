<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserVerificationCodeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
            'verification_code_type_id' => createOrRandomFactory(\App\Models\VerificationCodeType::class),
            'token_code' => $this->faker->randomNumber(),
            'expired_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
