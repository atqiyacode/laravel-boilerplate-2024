<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeMediaSocialFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeMediaSocial::class;

    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
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
