<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\Employee::class;

    public function definition(): array
    {
        return [
            'nik' => $this->faker->unique()->randomNumber(),
            'full_name' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-40 years', '-18 years'),

            'employee_type_id' => createOrRandomFactory(\Modules\Master\App\Models\EmployeeType::class),
            'gender_id' => createOrRandomFactory(\Modules\Master\App\Models\Gender::class),
            'religion_id' => createOrRandomFactory(\Modules\Master\App\Models\Religion::class),
            'field_of_work_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\FieldOfWork::class),
            'working_area_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\WorkingArea::class),
            'position_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\Position::class),
            'unit_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\Unit::class),
            'main_class_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\MainClass::class),
        ];
    }
}
