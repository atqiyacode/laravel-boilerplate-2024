<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentPlanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'period' => $this->faker->numberBetween(1, 4),
            'name_of_kak' => $this->faker->firstName(),
            'number_of_members' => $this->faker->numberBetween(1, 20),
            'time_period' => $this->faker->numberBetween(1, 4),
            'work_start_date' => $this->faker->dateTimeBetween('-6 months', now()),
            'end_work_date' => $this->faker->dateTimeBetween(now(), '+5 months'),
            'unit_id' => createOrRandomFactory(\App\Models\Unit::class),
            'schema' => $this->faker->randomElement(['1', '2']),
            'petition' => $this->faker->dateTimeBetween(now(), '+1 week'),
            'disposition' => $this->faker->dateTimeBetween(now(), '+1 week'),
        ];
    }
}
