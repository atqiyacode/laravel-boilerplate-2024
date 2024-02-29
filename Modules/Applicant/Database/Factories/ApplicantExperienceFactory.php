<?php

namespace Modules\Applicant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantExperienceFactory extends Factory
{
    protected $model = \Modules\Applicant\App\Models\ApplicantExperience::class;
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'level_of_education_id' => createOrRandomFactory(\Modules\Master\App\Models\LevelOfEducation::class),
            'nama_kegiatan' => $this->faker->firstName(),
            'nama_perusahaan' => $this->faker->firstName(),
            'lokasi_kegiatan' => $this->faker->firstName(),
            'pengguna_jasa' => $this->faker->firstName(),
            'uraian_tugas' => $this->faker->text(),
            'waktu_pelaksanaan_mulai' => $this->faker->dateTime(),
            'waktu_pelaksanaan_selesai' => $this->faker->dateTime(),
            'posisi_penugasan' => $this->faker->firstName(),
            'status_kepegawaian' => $this->faker->firstName(),
            'foto_surat_referensi' => $this->faker->firstName(),
            'note' => $this->faker->text(),
        ];
    }
}
