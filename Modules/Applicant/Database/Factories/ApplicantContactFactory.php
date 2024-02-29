<?php

namespace Modules\Applicant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantContactFactory extends Factory
{
    protected $model = \Modules\Applicant\App\Models\ApplicantContact::class;
    public function definition(): array
    {
        return [
            'phone' => $this->faker->unique()->phoneNumber(),
            'whatsapp' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
        ];
    }
}
