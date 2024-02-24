<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeCertificateOfExpertiseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
            'nama_kegiatan' => $this->faker->realText(50),
            'tahun' => $this->faker->year(2024),
            'penyelenggara' => $this->faker->company(),
            'foto_sertifikat' => $this->faker->imageUrl(),
        ];
    }
}
