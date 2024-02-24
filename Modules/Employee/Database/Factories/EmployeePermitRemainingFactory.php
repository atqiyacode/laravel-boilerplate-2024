<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePermitRemainingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'has_use' => $this->faker->numberBetween(6, 12),
            'limit' => $this->faker->numberBetween(6, 12),
            'total' => $this->faker->numberBetween(6, 12),
            'note' => $this->faker->text(),
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
        ];
    }
}
