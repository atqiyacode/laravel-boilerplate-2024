<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeContractFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeContract::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->uuid(),
            'start_date' => $this->faker->dateTimeBetween('-10 years', '+10 years'),
            'end_date' => $this->faker->dateTimeBetween('-5 years', '+20 years'),
            'note' => $this->faker->text(),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
        ];
    }
}
