<?php

namespace Modules\JobVacancy\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\JobVacancy\App\Models\JobVacancy;
use Modules\HRMaster\App\Models\Position;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobVacancySeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $positions = Position::all();
        $jobVacancies = [];

        foreach ($positions as $position) {
            $jobVacancies[] = [
                'title' => 'Lowongan Pekerjaan untuk ' . $position->name,
                'slug' => Str::slug('Lowongan Pekerjaan untuk ' . $position->name),
                'general_qualifications' => '<ol> <li> Lulus jenjang pendidikan terakhir dengan IPK minimal 2.75/4.00 untuk Perguruan Tinggi Negeri dan minimal 3.00/4.00 untuk Perguruan Tinggi Swasta; </li> <li> Sehat jasmani dan rohani, dan bagi Wanita tidak dalam keadaan hamil; </li> <li> Bersedia mengikuti seleksi secara Offline di wilayah DKI Jakarta dengan tetap menjaga protokol kesehatan; </li> <li> Memiliki Laptop yang dapat digunakan secara penuh untuk bekerja dengan minimal RAM 8 GB; </li> <li> Memiliki Handphone dengan produksi minimal tahun 2018; </li> <li> Memiliki dan mampu mengendarai kendaraan roda 2 (motor) untuk bekerja; </li> <li> Bertempat tinggal / berdomisili di wilayah DKI Jakarta (atau setidaknya di Wilayah Kota Depok, Kota Bekasi, Kota Tangerang Selatan dan Kota Tangerang); </li> <li> Berpenampilan Menarik, Formil, Rapi dan Sopan <br> a. Tidak Bertato <br> b. Tidak Bertindik <br> c. Rambut tidak gondrong (Bagi Laki-Laki) <br> d. Rambut tidak dicat/diwarnai <br> &nbsp; </li> <li> Berpakaian formal, rapih dan tertutup </li> <li> Mempunyai attitude yang baik, sopan, sabar dan komunikatif; </li> <li> Bersedia mengikuti Pelatihan dan Pembekalan sebelum mulai bekerja; </li> <li> Bersedia ditempatkan dimana saja di seluruh DKI Jakarta; </li> <li> Tidak sedang terikat kontrak kerja dengan instansi atau perusahaan lainnya; dan </li> <li> Bersedia tidak melakukan pekerjaan bebas lainnya pada saat bekerja. </li> </ol>',
                'job_description' => '<p> 1. Minimal Lulusan S1 pada Fakultas / Program studi Teknik Informatika, Sistem Informasi, Teknik Geodesi,Teknik Geomatika, dan Geografi;&nbsp; </p> <p> 2. Batas usia maksimal 40 tahun per 31 Desember 2023;&nbsp; </p> <p> 3. Pengalaman kerja professional (bukan magang) minimal 24 (dua puluh empat) bulan sebagai WebGIS Developer / Web GIS Programmer;&nbsp; </p> <p> 4. Memiliki penguasaan Web GIS development seperti Geoserver, LeafletJS, ArcGIS Enterprises, atau Web GIS framework lainnya;&nbsp; </p> <p> 5. Memiliki pengalaman dalam perancangan dan implementasi API services; dan&nbsp; </p> <p> 6. Diutamakan memiliki pengalaman implementasi WebGIS berbasis database Oracle SDE. </p>',
                'type' => rand(0, 1) ? 'open' : 'close',
                'status' => 1,
                'open_date' => fake()->dateTimeBetween('-5 weeks', 'now')->format('Y-m-d H:i:s'),
                'close_date' => fake()->dateTimeBetween('now', '+5 weeks')->format('Y-m-d H:i:s'),
                'position_id' => $position->id,
                'project_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Use database transaction for data insertion
        try {
            DB::beginTransaction();

            // Insert the job vacancies data in a batch
            JobVacancy::insert($jobVacancies);
            // DB::table('job_vacancies')->insert($jobVacancies);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            // Handle the exception.
        }
    }
}
