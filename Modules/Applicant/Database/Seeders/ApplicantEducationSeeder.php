<?php

namespace Modules\Applicant\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Applicant\App\Models\ApplicantEducation;
use Modules\Applicant\App\Models\ApplicantResume;
use Modules\Master\App\Models\LevelOfEducation;
use Modules\Master\App\Models\University;
use Illuminate\Database\Seeder;

class ApplicantEducationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $resumesId = ApplicantResume::pluck('id')->all();
        $university = collect(University::all())->random();

        $levelOfEducations = collect(LevelOfEducation::all());
        $data = [];
        foreach ($resumesId as $value) {
            $data[] = [
                "applicant_resume_id" => $value,
                "level_of_education_id" => $levelOfEducations->random()->id,
                "ptn_pts" => fake()->randomElement(['PTN', 'PTS']),
                "nama_institusi" => $university->name,
                "fakultas" => "Fakultas Peternakan",
                "jurusan" => "Peternakan",
                "npm" => "345678901",
                "ipk" => "3.40",
                "no_ijazah" => "1234567890",
                "tahun_masuk" => "2010",
                "tahun_lulus" => "2013",
                "status_berkas" => "OK",
                "status_kelulusan" => "Lulus",
                "foto_ijazah" => fake()->imageUrl(),
                "foto_transkrip_nilai" => fake()->imageUrl(),
                "link_dikti" => "https://pddikti.kemdikbud.go.id/data_mahasiswa/MUNCNzdERjYtRDYyOS00MzkxLUE1REMtMjM3MkFGQjMwMzdG",
                "foto_screenshot_dikti" => fake()->imageUrl()
            ];
        }

        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            ApplicantEducation::insert($chunk);
        }
    }
}
