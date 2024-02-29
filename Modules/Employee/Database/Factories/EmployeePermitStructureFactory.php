<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeePermitStructureFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeePermitStructure::class;

    public function definition(): array
    {
        return [
            'type_of_permit_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\TypeOfPermit::class),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
        ];
    }
}
