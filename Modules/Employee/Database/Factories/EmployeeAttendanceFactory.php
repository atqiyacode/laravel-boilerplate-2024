<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeAttendanceFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeAttendance::class;

    public function definition(): array
    {
        return [
            'check_date' => $this->faker->dateTimeBetween('-1 month', '+1 day'),
            'check_in' => $this->faker->time(),
            'check_out' => $this->faker->time(),
            'photo_check_in' => $this->faker->imageUrl(),
            'photo_check_out' => $this->faker->imageUrl(),
            'location_check_in' => json_encode([
                'lat' => $this->faker->latitude(),
                'lng' => $this->faker->longitude(),
            ]),
            'location_check_out' => json_encode([
                'lat' => $this->faker->latitude(),
                'lng' => $this->faker->longitude(),
            ]),
            'note' => $this->faker->text(),
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
        ];
    }
}
