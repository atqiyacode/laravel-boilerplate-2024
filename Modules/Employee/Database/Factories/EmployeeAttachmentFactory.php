<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeAttachmentFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeAttachment::class;

    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
            'foto_ktp' => $this->faker->firstName(),
            'foto_npwp' => $this->faker->firstName(),
            'foto_pasfoto' => $this->faker->firstName(),
            'foto_selfie' => $this->faker->firstName(),
            'foto_kswp' => $this->faker->firstName(),
            'foto_cv' => $this->faker->firstName(),
        ];
    }
}
