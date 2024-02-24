<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\JobApplication\App\Models\JobApplicationStatus;
use Illuminate\Database\Seeder;

class JobApplicationStatusSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        JobApplicationStatus::create([
            'code' => 1,
            'name' => 'Seleksi Berkas',
            'description' => 'lamaran aktif dan sedang diseleksi berkas',
        ]);
        JobApplicationStatus::create([
            'code' => 2,
            'name' => 'Tes Tertulis',
            'description' => 'lamaran lulus seleksi berkas, lanjut ketahap tes tertulis psikotest dan bidang keilmuan terkait',
        ]);
        JobApplicationStatus::create([
            'code' => 3,
            'name' => 'Wawancara SDM',
            'description' => 'lamaran lulus tes tertulis, lanjut ketahap wawancara hrd',
        ]);
        JobApplicationStatus::create([
            'code' => 4,
            'name' => 'Wawancara User',
            'description' => 'lamaran lulus wawancara hrd, lanjut ketahap wawancara user',
        ]);
        JobApplicationStatus::create([
            'code' => 5,
            'name' => 'Diterima',
            'description' => 'lamaran diterima',
        ]);
        JobApplicationStatus::create([
            'code' => 6,
            'name' => 'Ditolak',
            'description' => 'lamaran ditolak',
        ]);
        // JobApplicationStatus::create([
        //     'name' => 'onhold',
        //     'description' => 'lamaran dihold, kandidat masuk ke dalam kandidat terpilih dan mungkin bisa ditolak atau dilanjut',
        // ]);
    }
}
