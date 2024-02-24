<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\HRMaster\App\Models\WorkingArea;
use Illuminate\Database\Seeder;

class WorkingAreaSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $lists = [
            "SAMSAT UTARA",
            "BADAN",
            "SAMSAT SELATAN",
            "SAMSAT TIMUR",
            "UP3D CAKUNG",
            "UP3D KALIDERES",
            "SAMSAT BARAT",
            "SUBAN BARAT",
            "UP3D CILANDAK",
            "UP3D PENJARINGAN",
            "UP3D CENGKARENG",
            "UP3D TEBET",
            "UP3D PALMERAH",
            "UP3D KELAPA GADING",
            "UP3D KEMAYORAN",
            "UP3D CEMPAKA PUTIH",
            "UP3D TAMAN SARI",
            "UP3D GROGOL PETAMBURAN",
            "UP3D TAMBORA",
            "UP3D KRAMAT JATI",
            "UP3D PANCORAN",
            "UP3D PESANGGRAHAN",
            "UP3D JOHAR BARU",
            "UP3D KOJA",
            "UP3D PULO GADUNG",
            "UP3D CIRACAS",
            "UP3D P1000",
            "UP3D CILINCING",
            "UP3D DUREN SAWIT",
            "UP3D MAMPANG PRAPATAN",
            "UP3D SAWAH BESAR",
            "UP3D PASAR REBO",
            "UP3D CIPAYUNG",
            "UP3D TANJUNG PRIOK",
            "UP3D MATRAMAN",
            "UP3D SETIA BUDI",
            "UP3D CILINDING",
            "UP3D KEBAYORAN BARU",
            "UP3D PENJARINGAN",
            "UP3D KEBON JERUK",
            "UP3D GAMBIR",
            "UP3D MAKASAR",
            "UP3D PADEMANGAN",
            "UP3D KEMBANGAN",
            "UP3D JAGAKARSA",
            "UP3D TANAH ABANG",
            "SUBAN PUSAT",
            "SUBAN TIMUR",
            "SUBAN SELATAN",
            "SUBAN UTARA",
            "LAINNYA",
        ];
        $chunkSize = 200;

        collect($lists)->chunk($chunkSize)->each(function ($chunk) {
            $data = [];

            foreach ($chunk as $key) {
                $data[] = [
                    'name' => $key,
                    'description' => 'Description ' . $key,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            WorkingArea::insert($data);
        });
    }
}
