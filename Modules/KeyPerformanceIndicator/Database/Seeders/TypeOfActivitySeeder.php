<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\KeyPerformanceIndicator\Modules\KeyPerformanceIndicator\App\Models\TypeOfActivity;
use Illuminate\Database\Seeder;

class TypeOfActivitySeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $data = [
            "MELAKSANAKAN ANALISIS DAN/ATAU PENGECEKAN LAPANGAN TERHADAP HASIL VALIDASI UPPPD (PROFILING)		",
            "MELAKSANAKAN PENGUKURAN LUAS BUMI DAN LUAS BANGUNAN TERHADAP NOP BARU YANG TIDAK ADA SERTIFIKAT (INCLUDE BANGUNAN) PARALEL DENGAN MDS FRONTLINE		",
            "MELAKSANAKAN ANALISIS DAN/ATAU PENGECEKAN LAPANGAN TERHADAP PERUBAHAN JENIS PENGGUNAAN BANGUNAN (JPB) ATAS OBJEK PBB-P2		",
            "MELAKSANAKAN PERBANTUAN AKOMODIR PERUBAHAN ALIH FUNGSI BANGUNAN MENJADI TANAH KOSONG - BEGITU JUGA SEBALIKNYA		",
            "MELAKSANAKAN ANALISIS DAN/ATAU PENGUKURAN LAPANGAN LUAS BANGUNAN TERHADAP HASIL VALIDASI PENGAJUAN BPHTB (BEA PEROLEHAN HAK TANAH DAN BANGUNAN)		",
            "MELAKSANAKAN PERBAIKAN DATA BIDANG HASIL PENGUKURAN DI TAHUN SEBELUMNYA DARI FEEDBACK UPPPD DAN/ATAU UNIT PEMETAAN DALAM RANGKA PENINGKATAN KUALITAS PETA PBB-P2		",
            "MELAKSANAKAN PENGECEKAN DATA OBJEK PAJAK BARU BERUPA PAJAK REKLAME, PAJAK RESTORAN DAN PAJAK HIBURAN		",
            "TUGAS PEMBANTUAN LAINNYA		",
            "PENGUKURAN		",
            "PROLOG PENGUKURAN (PENDAHULUAN) DAN MOBILISASI		",
            "PENOLAKAN / KETIDAKTERSEDIAAN WP TERHADAP PROLOG PENGUKURAN ATAS BIDANG OBJEK PAJAK 		",
            "PENGUKURAN BIDANG BUMI		",
            "PENGUKURAN BIDANG BANGUNAN		",
            "PENGOLAHAN DAN PEMUTAKHIRAN DATA HASIL PENGUKURAN BIDANG BUMI		",
            "PENGOLAHAN DAN PEMUTAKHIRAN DATA HASIL PENGUKURAN BIDANG BANGUNAN		",
            "PEMBUATAN BERITA ACARA PENGUKURAN DAN DIGITALISASI DALAM FORMAT GEODATABASE		",
            "MELAKUKAN ASISTENSI DENGAN KASATPEL PENDATAAN DAN FINALISASI BERITA ACARA PENGUKURAN		",
            "MELAKUKAN KEGIATAN PELAPORAN DOKUMENTASI HARIAN		",
            "MELAKUKAN KEGIATAN PELAPORAN CASE REPORT LAPANGAN		",
            "MELAKSANAKAN KEGIATAN LAINNYA		",
        ];
        foreach ($data as $key) {
            TypeOfActivity::factory()->create([
                'name' => $key
            ]);
        }
    }
}
