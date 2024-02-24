<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePermitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type_of_permit_id' => createOrRandomFactory(\App\Models\TypeOfPermit::class),
            'permit_status_id' => createOrRandomFactory(\App\Models\PermitStatus::class),
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
            'start_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'end_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'note' => $this->faker->text(),
        ];
    }
}
