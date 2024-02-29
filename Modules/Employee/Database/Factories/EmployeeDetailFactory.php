<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeDetailFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeDetail::class;

    public function definition(): array
    {
        return [
            'id_card' => $this->faker->uuid(),
            'npwp' => $this->faker->uuid(),
            'account_number' => $this->faker->uuid(),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
        ];
    }
}
