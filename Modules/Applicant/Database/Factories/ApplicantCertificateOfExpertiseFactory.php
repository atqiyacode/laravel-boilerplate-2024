<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantCertificateOfExpertiseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'nama_kegiatan' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'tahun' => $this->faker->year(2024),
            'penyelenggara' => $this->faker->company(),
            'foto_sertifikat' => $this->faker->imageUrl(),
        ];
    }
}
