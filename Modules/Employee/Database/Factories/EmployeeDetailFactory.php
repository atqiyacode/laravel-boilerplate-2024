<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_card' => $this->faker->uuid(),
            'npwp' => $this->faker->uuid(),
            'account_number' => $this->faker->uuid(),
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
        ];
    }
}
