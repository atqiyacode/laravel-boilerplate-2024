<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeEmergencyContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
        ];
    }
}
