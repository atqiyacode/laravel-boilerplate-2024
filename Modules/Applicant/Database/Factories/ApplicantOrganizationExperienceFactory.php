<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantOrganizationExperienceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'nama_organisasi' => $this->faker->realText(50),
            'posisi' => $this->faker->jobTitle(),
            'jenis_organisasi' => $this->faker->creditCardType(),
            'tahun_mulai' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = '-6 years', $timezone = null),
            'tahun_selesai' => $this->faker->dateTimeBetween($startDate = '-6 years', $endDate = 'now', $timezone = null),
        ];
    }
}
