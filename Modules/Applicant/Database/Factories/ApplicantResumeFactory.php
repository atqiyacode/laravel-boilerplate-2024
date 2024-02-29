<?php

namespace Modules\Applicant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantResumeFactory extends Factory
{
    protected $model = \Modules\Applicant\App\Models\ApplicantResume::class;
    public function definition(): array
    {
        return [
            'nik' => $this->faker->firstName(),
            'tempat_lahir' => $this->faker->firstName(),
            'tanggal_lahir' => $this->faker->dateTime(),
            'jenis_kelamin' => $this->faker->firstName(),
            'alamat_domisili' => $this->faker->firstName(),
            'alamat_ktp' => $this->faker->firstName(),
            'tentang_diri' => $this->faker->text(),
            'other_fields' => $this->faker->text(),
            'foto_ktp' => $this->faker->firstName(),
            'foto_npwp' => $this->faker->firstName(),
            'foto_pasfoto' => $this->faker->firstName(),
            'foto_selfie' => $this->faker->firstName(),
            'foto_kswp' => $this->faker->firstName(),
            'foto_cv' => $this->faker->firstName(),
            'religion_id' => $this->faker->firstName(),
            'user_id' => createOrRandomFactory(\Modules\User\App\Models\User::class),
        ];
    }
}
