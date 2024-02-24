<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantAchievementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'nama_kegiatan' => 'Kegiatan ' . $this->faker->jobTitle(),
            'tahun' => $this->faker->year(2023),
            'skala' => $this->faker->randomElement([
                'international',
                'local',
                'provinsi',
                'kota/kabupaten',
                'kecamatan',
                'Kelurahan',
                'RT/RW',
            ]),
            'foto_dokumen' => $this->faker->imageUrl(),
        ];
    }
}
