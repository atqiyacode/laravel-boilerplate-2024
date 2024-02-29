<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeExperience;
use Modules\Master\App\Models\LevelOfEducation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmployeeExperienceSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // EmployeeExperience::factory(10)->create();

        $employees = Employee::pluck('id')->all();
        $educationLevels = LevelOfEducation::pluck('id', 'name')->all(); // Bulk retrieval

        $experienceData = [];

        foreach ($employees as $value) {
            $previous_waktu_selesai = null;
            for ($i = 0; $i < 3; $i++) {
                $level_of_education = ($i === 0) ? "D3" : ($i === 1 ? "S1" : "S2");

                $waktu_pelaksanaan_mulai = Carbon::createFromDate(rand(2013, 2017), rand(1, 12), rand(1, 28));

                if ($previous_waktu_selesai !== null && $previous_waktu_selesai->greaterThanOrEqualTo($waktu_pelaksanaan_mulai)) {
                    $waktu_pelaksanaan_mulai = $previous_waktu_selesai->copy()->addDay();
                }

                $waktu_pelaksanaan_selesai = $waktu_pelaksanaan_mulai->copy()->addMonths(rand(1, 12))->subDay();
                $previous_waktu_selesai = $waktu_pelaksanaan_selesai;

                $experienceData[] = [
                    "employee_id" => $value,
                    "level_of_education_id" => $educationLevels[$level_of_education], // Use the pre-retrieved value
                    "nama_kegiatan" => "System Development " . ($i + 1),
                    "nama_perusahaan" => "Company Name " . ($i + 1),
                    "lokasi_kegiatan" => "Location " . ($i + 1),
                    "pengguna_jasa" => "Service User " . ($i + 1),
                    "uraian_tugas" => "Task Description " . ($i + 1),
                    "waktu_pelaksanaan_mulai" => $waktu_pelaksanaan_mulai,
                    "waktu_pelaksanaan_selesai" => $waktu_pelaksanaan_selesai,
                    "posisi_penugasan" => "PHP Developer",
                    "status_kepegawaian" => "Kontrak",
                    "foto_surat_referensi" => fake()->imageUrl()
                ];
            }
        }

        // Perform a batch insertion
        EmployeeExperience::insert($experienceData);
    }
}
