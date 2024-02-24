<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeMediaSocialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
            'nama_media' => $this->faker->randomElement([
                'FACEBOOK',
                'TWITTER',
                'INSTAGRAM',
                'TIK-TOK',
                'YOUTUBE',
            ]),
            'link' => $this->faker->url(),
        ];
    }
}
