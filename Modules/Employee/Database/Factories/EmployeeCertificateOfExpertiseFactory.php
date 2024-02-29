<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeCertificateOfExpertiseFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeCertificateOfExpertise::class;

    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
            'nama_kegiatan' => $this->faker->realText(50),
            'tahun' => $this->faker->year(2024),
            'penyelenggara' => $this->faker->company(),
            'foto_sertifikat' => $this->faker->imageUrl(),
        ];
    }
}
