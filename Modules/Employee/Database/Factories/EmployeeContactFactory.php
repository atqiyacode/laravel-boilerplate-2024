<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeContactFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeContact::class;

    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'whatsapp' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
        ];
    }
}
