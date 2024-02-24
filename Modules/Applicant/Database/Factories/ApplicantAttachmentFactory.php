<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantAttachmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'foto_ktp' => $this->faker->imageUrl(),
            'foto_npwp' => $this->faker->imageUrl(),
            'foto_pasfoto' => $this->faker->imageUrl(),
            'foto_selfie' => $this->faker->imageUrl(),
            'foto_kswp' => $this->faker->imageUrl(),
            'foto_cv' => $this->faker->imageUrl(),
        ];
    }
}
