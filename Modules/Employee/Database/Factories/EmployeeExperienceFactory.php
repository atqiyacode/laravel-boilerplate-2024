<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeExperienceFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeExperience::class;

    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
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
