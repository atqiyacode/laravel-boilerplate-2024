<?php

namespace Modules\Applicant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantRelationReferenceFactory extends Factory
{
    protected $model = \Modules\Applicant\App\Models\ApplicantRelationReference::class;
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
