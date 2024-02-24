<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeAchievementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
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
