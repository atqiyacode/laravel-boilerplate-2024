<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VerificationCodeTypeFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\VerificationCodeType::class;
    public function definition(): array
    {
        return [
            'slug' => $this->faker->firstName(),
			'name' => $this->faker->firstName(),
        ];
    }
}
