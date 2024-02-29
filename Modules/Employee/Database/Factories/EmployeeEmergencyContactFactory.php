<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeEmergencyContactFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeEmergencyContact::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
        ];
    }
}
