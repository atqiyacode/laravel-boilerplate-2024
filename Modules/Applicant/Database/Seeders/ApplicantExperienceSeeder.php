<?php

namespace Modules\Applicant\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Applicant\App\Models\ApplicantExperience;
use Modules\Applicant\App\Models\ApplicantResume;
use Modules\Master\App\Models\LevelOfEducation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ApplicantExperienceSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $levelOfEducation = collect(LevelOfEducation::all())->random();

        $resumesId = ApplicantResume::with([
            'user'
        ])->pluck('id')->all();
        $data = [];
        foreach ($resumesId as $value) {
            $previous_waktu_selesai = null;
            for ($i = 0; $i < 3; $i++) {
                // $level_of_education = ($i === 0) ? "D3" : ($i === 1 ? "S1" : "S2");

                $waktu_pelaksanaan_mulai = Carbon::createFromDate(rand(2013, 2017), rand(1, 12), rand(1, 28));

                if ($previous_waktu_selesai !== null && $previous_waktu_selesai->greaterThanOrEqualTo($waktu_pelaksanaan_mulai)) {
                    $waktu_pelaksanaan_mulai = $previous_waktu_selesai->copy()->addDay();
                }

                $waktu_pelaksanaan_selesai = $waktu_pelaksanaan_mulai->copy()->addMonths(rand(1, 12))->subDay();
                $previous_waktu_selesai = $waktu_pelaksanaan_selesai;

                $data[] = [
                    "applicant_resume_id" => $value,
                    "level_of_education_id" => $levelOfEducation->id,
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
        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            ApplicantExperience::insert($chunk);
        }
    }
}
