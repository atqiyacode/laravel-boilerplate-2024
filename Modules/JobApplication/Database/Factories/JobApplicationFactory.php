<?php

namespace Modules\JobApplication\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationFactory extends Factory
{
    protected $model = \Modules\JobApplication\App\Models\JobApplication::class;
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
            'job_vacancy_id' => createOrRandomFactory(\Modules\JobVacancy\App\Models\JobVacancy::class),
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'status' => $this->faker->randomNumber(),
            'keterangan' => $this->faker->text(),
            'referal' => $this->faker->firstName(),
        ];
    }
}
