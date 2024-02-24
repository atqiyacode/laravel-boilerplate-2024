<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePermitStructureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type_of_permit_id' => createOrRandomFactory(\App\Models\TypeOfPermit::class),
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
        ];
    }
}
