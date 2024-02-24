<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\DynamicForm\App\Models\FormQuestionPraRegistration;
use Modules\DynamicForm\App\Models\Project;
use Illuminate\Database\Seeder;

class FormQuestionPraRegistrationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $projects = Project::get()->pluck("id")->toArray();
        // $projects = Project::with("jobVacancies.position")->get();
        foreach ($projects as $key => $project) {
            // $positions = $project->jobVacancies->pluck("position")->flatten()->pluck("id")->toArray();
            FormQuestionPraRegistration::create([
                "project_id" => $project,
                // "project_id" => $project->id,
                "batch" => "Saudara/i bertugas di batch berapa?",
                // "position_id" => getRandomIdFromArray($positions),
                "wilayah_tugas" => "Wilayah Tugas saat ini",
                "ingin_malanjutkan_pekerjaan" => "Apakah saudara/i berkeinginan untuk melanjutkan kegiatan di Tahun 2023?",
                "ingin_posisi_yang_sama" => "Apakah saudara/i berkeinginan untuk melanjutkan pada posisi yang sama?",
                "komitmen" => "Apakah saudara/i bersedia berkomitmen untuk melanjutkan kegiatan SPD di tahun 2023 sampai dengan berakhirnya kontrak?",
                "ketentuan" => "Apakah saudara/i bersedia mengikuti ketentuan yang ditetapkan oleh Bapenda pada Kegiatan Tahun anggaran 2023?",
                "kendala" => "Apa kendala yang saudara/i alami saat bertugas pada Kegiatan tahun anggaran 2023?",
                "kesan_pesan" => "Kesan dan Pesan selama Kegiatan Sensus Pajak Daerah Tahun Anggaran 2023",
                "kritik_saran" => "Kritik dan Saran terhadap kegiatan Sensus Pajak Daerah tahun 2023",
            ]);
        }
    }
}
