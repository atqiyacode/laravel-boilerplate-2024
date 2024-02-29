<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeActivityFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeActivity::class;

    public function definition(): array
    {
        return [
            'date_of_activity' => $this->faker->dateTimeBetween('-3 month', now()),
            'detail' => $this->faker->text(),
            'attachment' => $this->faker->url(),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
            'type_of_activity_id' => createOrRandomFactory(\Modules\KeyPerformanceIndicator\App\Models\TypeOfActivity::class),
            'note' => $this->faker->text(),
        ];
    }
}
