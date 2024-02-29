<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePermitFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeePermit::class;

    public function definition(): array
    {
        return [
            'type_of_permit_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\TypeOfPermit::class),
            'permit_status_id' => createOrRandomFactory(\Modules\Master\App\Models\PermitStatus::class),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
            'start_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'end_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'note' => $this->faker->text(),
        ];
    }
}
