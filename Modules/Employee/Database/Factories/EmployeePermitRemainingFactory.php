<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePermitRemainingFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeePermitRemaining::class;

    public function definition(): array
    {
        return [
            'has_use' => $this->faker->numberBetween(6, 12),
            'limit' => $this->faker->numberBetween(6, 12),
            'total' => $this->faker->numberBetween(6, 12),
            'note' => $this->faker->text(),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
        ];
    }
}
