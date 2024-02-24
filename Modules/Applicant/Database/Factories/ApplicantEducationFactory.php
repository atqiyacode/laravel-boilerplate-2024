<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantEducationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'level_of_education_id' => createOrRandomFactory(\Modules\Master\App\Models\LevelOfEducation::class),
            'ptn_pts' => $this->faker->randomElement([
                'PTN',
                'PTS'
            ]),
            'nama_institusi' => $this->faker->company(),
            'fakultas' => $this->faker->jobTitle(),
            'jurusan' => $this->faker->jobTitle(),
            'npm' => $this->faker->randomNumber(10),
            'ipk' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 4),
            'no_ijazah' => $this->faker->creditCardNumber(),
            'tahun_masuk' => $this->faker->year(2015),
            'tahun_lulus' => $this->faker->year(2022),
            'status_berkas' => $this->faker->randomElement([
                'OK',
                'CEK',
                'BELUM OK',
            ]),
            'status_kelulusan' => $this->faker->randomElement([
                'LULUS',
                'BELUM LULUS',
                'DROP OUT',
                'CUTI'
            ]),
            'foto_ijazah' => $this->faker->imageUrl(),
            'foto_transkrip_nilai' => $this->faker->imageUrl(),
            'link_dikti' => $this->faker->imageUrl(),
            'foto_screenshot_dikti' => $this->faker->imageUrl(),
        ];
    }
}
