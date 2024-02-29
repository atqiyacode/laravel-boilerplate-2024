<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeOrganizationExperienceFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeOrganizationExperience::class;

    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
            'nama_organisasi' => $this->faker->realText(50),
            'posisi' => $this->faker->jobTitle(),
            'jenis_organisasi' => $this->faker->creditCardType(),
            'tahun_mulai' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = '-6 years', $timezone = null),
            'tahun_selesai' => $this->faker->dateTimeBetween($startDate = '-6 years', $endDate = 'now', $timezone = null),
        ];
    }
}
