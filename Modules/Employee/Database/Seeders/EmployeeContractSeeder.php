<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeContract;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeContractSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    function generateUniqueRandomNumber($length)
    {
        $maxDigits = strlen(mt_getrandmax());
        $numDigits = min($length, $maxDigits);

        $randomNumber = str_pad(mt_rand(0, 10 ** $numDigits - 1), $numDigits, '0', STR_PAD_LEFT);

        return $randomNumber;
    }

    public function run(): void
    {
        $kodeSirup = [];
        $employees = Employee::pluck('id')->all();
        $contractData = [];

        foreach ($employees as $key => $value) {
            $contractData[] = [
                "employee_id" => $value,
                "nama_paket" => "Manajemen Unit Pelaksana Teknis Administrasi dan Keuangan untuk Persiapan dan Pelaksanaan Administrasi dan Keuangan dalam rangka Kegiatan Pemeliharaan Dan Peningkatan Kualitas Data Geospasial Pajak Daerah Tahun 2023",
                "kode_sirup" => $this->generateUniqueRandomNumber(8),
                "nomor_permohonan_pengadaan" => $value . "/SPPBJ/PPK-PEND.1/I/2023",
                "tanggal_permohonan_pengadaan" => "2022-12-19",
                "no_und_dpl" => $value . "/UND/PL/JK/ORG/XII/2022",
                "tanggal_und_dpl" => "2022-12-20",
                "no_ba_hpl" => $value . "/HPL/PL/JK/ORG/XII/2022",
                "tanggal_ba_hpl" => "2022-12-29",
                "no_sppbj" => $value . "/SPPBJ/PPK-PEND.1/I/2023",
                "tanggal_sppbj" => "2023-01-02",
                "no_spk" => $value . "/SPK/PPK-PEND.1/I/2023",
                "tanggal_spk" => "2023-01-02",
                "no_spmk" => $value . "/SPK/PPK-PEND.1/I/2023",
                "tanggal_spmk" => "2023-01-02",
                "no_adendum_spk" => $value . "/SPK/PPK-PEND.1/I/2023",
                "tanggal_adendum_spk" => "2023-01-02",
                "kegiatan" => "Nama kegiatan",
                "sub_kegiatan" => "Nama sub kegiatan",
                "penugasan" => "Nama penugasan",
                "status" => 1,
            ];

            $contractData[] = [
                "employee_id" => $value,
                "nama_paket" => "Manajemen Unit Pelaksana Teknis Administrasi dan Keuangan untuk Persiapan dan Pelaksanaan Administrasi dan Keuangan dalam rangka Kegiatan Pemeliharaan Dan Peningkatan Kualitas Data Geospasial Pajak Daerah Tahun 2022",
                "kode_sirup" => $this->generateUniqueRandomNumber(8),
                "nomor_permohonan_pengadaan" => $value . "/SPPBJ/PPK-PEND.1/I/2023",
                "tanggal_permohonan_pengadaan" => "2022-12-19",
                "no_und_dpl" => $value . "/UND/PL/JK/ORG/XII/2022",
                "tanggal_und_dpl" => "2022-12-20",
                "no_ba_hpl" => $value . "/HPL/PL/JK/ORG/XII/2022",
                "tanggal_ba_hpl" => "2022-12-29",
                "no_sppbj" => $value . "/SPPBJ/PPK-PEND.1/I/2023",
                "tanggal_sppbj" => "2023-01-02",
                "no_spk" => $value . "/SPK/PPK-PEND.1/I/2023",
                "tanggal_spk" => "2023-01-02",
                "no_spmk" => $value . "/SPK/PPK-PEND.1/I/2023",
                "tanggal_spmk" => "2023-01-02",
                "no_adendum_spk" => $value . "/SPK/PPK-PEND.1/I/2023",
                "tanggal_adendum_spk" => "2023-01-02",
                "kegiatan" => "Nama kegiatan",
                "sub_kegiatan" => "Nama sub kegiatan",
                "penugasan" => "Nama penugasan",
                "status" => 0,
            ];
        }

        // Use database transaction for data insertion
        try {
            DB::beginTransaction();

            // Insert the contract data
            EmployeeContract::insert($contractData);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            // Handle the exception.
        }
    }
}
