<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantRelationReferenceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'nama' => $this->faker->name(),
            'jabatan' => $this->faker->jobTitle(),
            'no_telf' => $this->faker->phoneNumber(),
            'hubungan' => $this->faker->randomElement(['TEMAN', 'KAKAK', 'PAMAN', 'AYAH', 'IBU', 'SEPUPU', 'KEPONAKAN']),
        ];
    }
}
