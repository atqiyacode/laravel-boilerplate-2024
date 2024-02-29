<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserVerificationCodeFactory extends Factory
{
    protected $model = \Modules\User\App\Models\UserVerificationCode::class;
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\Modules\User\App\Models\User::class),
            'verification_code_type_id' => createOrRandomFactory(\Modules\Master\App\Models\VerificationCodeType::class),
            'token_code' => $this->faker->randomNumber(),
            'expired_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
