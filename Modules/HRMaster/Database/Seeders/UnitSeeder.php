<?php

namespace Modules\HRMaster\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\HRMaster\App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $positions = [
            1 => "Kepala UPTAK",
            2 => "Kepala Bidang Dokumentasi dan Konten Digital",
            3 => "Kepala Bidang Sumber Daya Manusia",
            4 => "Kepala Bidang Manajemen Arsip",
            5 => "Kepala Bidang Pengendali Laporan, Dokumen, dan Arsip Digital",
            6 => "Kepala Bidang Keuangan",
            7 => "Kepala Bidang Monev dan HandOver",
            8 => "Wakil Kepala Bidang Sumber Daya Manusia",
            9 => "Wakil Kepala Bidang Dokumentasi dan Konten Digital",
            10 => "Sekretaris Umum",
            11 => "Sekretaris Khusus",
            12 => "Wakil Kepala Bidang Pengendali Laporan, Dokumen, dan Arsip Digital",
            13 => "Wakil Kepala Bidang Monev dan HandOver",
            14 => "Wakil Kepala Bidang Manajemen Arsip",
            15 => "Wakil Kepala Bidang Keuangan",
            16 => "Creative Designer",
            17 => "Senior Admin / Operator",
            18 => "Staf Administrasi",
            19 => "Analis Perancang Kantor Jakarta SmartTax",
            20 => "Tenaga Ahli Geospasial",
            21 => "Tenaga Ahli Geospasial Pajak Daerah",
            22 => "Project Manager Backline",
            23 => "Co-Project Manager Spatial Data Integration",
            24 => "Co-Project Manager Spatial Data Analytics",
            25 => "Supervisor Data Repository",
            26 => "Supervisor Spatial Data Integration",
            27 => "Supervisor Spatial Data Analytics",
            28 => "Regional Gis Analyst",
            29 => "Studio Gis Analyst",
            30 => "Junior Data Scientist",
            31 => "GIS Operator",
            32 => "Junior Supervisor",
            33 => "Project Manager Frontline",
            34 => "Co-Project Manager",
            35 => "Supervisor Data Collecting",
            36 => "Field Manager",
            37 => "Field Gis Analyst",
            38 => "Frontline Officer",
            39 => "Junior Field GIS Analyst",
            40 => "Project Manager",
            41 => "Assistant Profesional Staff",
            42 => "Junior Field Manager",
            43 => "Spatial Tax Surveyor",
            44 => "Operator Stakeholder Management",
            45 => "Junior Spatial Tax Surveyor",
            46 => "Operator Dashboard",
            47 => "Spatial Supporting Surveyor",
            48 => "Junior Spatial Supporting Surveyor",
            49 => "Tenaga Ahli Penyusun Dokumen",
            50 => "Tenaga Pendukung Penyusun Dokumen",
            51 => "Drafter Dokumen",
            52 => "UI/UX Developer",
            53 => "Quality Assurance and Technical Writer",
            54 => "Fullstack Developer",
            55 => "Backend Developer",
        ];

        $chunkSize = 200;

        collect($positions)->chunk($chunkSize)->each(function ($chunk) {
            $positionsData = [];

            foreach ($chunk as $key => $positionName) {
                $positionsData[] = [
                    'name' => $positionName,
                    'description' => 'Description ' . $positionName,
                    'status' => 1,
                ];
            }

            Unit::upsert($positionsData, ['name'], null);
        });
    }
}
