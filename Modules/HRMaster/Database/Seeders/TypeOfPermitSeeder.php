<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\HRMaster\App\Models\TypeOfPermit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeOfPermitSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $urgent = TypeOfPermit::create([
            'name' => Str::upper('izin alasan penting'),
            'description' => '<p><strong>A.</strong> Surat Izin Alasan Penting dapat digunakan apabila personel berhalangan hadir karena:</p><ol><li><strong><em>Anggota keluarga meninggal dunia</em></strong></li><li><strong><em>Melangsungkan pernikahan baik diri sendiri ataupun anak kandung</em></strong></li><li><strong><em>Melahirkan atau Mendampingi istri melahirkan</em></strong></li><li><strong><em>Mendampingi keluarga yang sakit di Rumah Sakit</em></strong></li></ol><p><br></p><p><strong>B.</strong> Surat Izin Alasan Penting harus disertai dengan lampiran pendukung seperti buku nikah, surat kematian, surat rawat inap dan lainnya menyesuaikan poin yang digunakan.</p><p><br></p><p><strong>C.</strong> Surat Izin Alasan Penting diserahkan kepada tim SDM maksimal 1 hari setelah personel kembali aktif bekerja</p><p><br></p><p><strong>D.</strong> <a href="https://bit.ly/Contoh_Surat_Izin_Alasan_Penting" rel="noopener noreferrer" target="_blank"><strong>LINK PANDUAN LENGKAP ISI SURAT IZIN ALASAN PENTING</strong></a></p>'
        ]);

        $leave = TypeOfPermit::create([
            'name' => Str::upper('izin tidak masuk terencana'),
            'description' => '<p>Surat Izin Terencana diserahkan kepada tim SDM <strong>maksimal 1 hari</strong> sebelum izin berlangsung</p><ol><li>Surat Izin Tidak Terencana dapat digunakan apabila personel berhalangan hadir karena faktor tertentu yang mendesak, tanpa persiapan dan tidak dijadwalkan (sakit/kecelakaan, anggota keluarga sakit, dan bencana alam)</li><li>﻿Surat Izin Tidak Terencana diserahkan kepada tim SDM <strong>maksimal 1 hari</strong> setelah personel kembali aktif bekerja</li></ol>'
        ]);

        $leaveUnplanned = TypeOfPermit::create([
            'name' => Str::upper('izin tidak masuk tidak terencana'),
            'description' => '<p>Surat Izin Terencana diserahkan kepada tim SDM <strong>maksimal 1 hari</strong> sebelum izin berlangsung</p><ol><li>Surat Izin Tidak Terencana dapat digunakan apabila personel berhalangan hadir karena faktor tertentu yang mendesak, tanpa persiapan dan tidak dijadwalkan (sakit/kecelakaan, anggota keluarga sakit, dan bencana alam)</li><li>﻿Surat Izin Tidak Terencana diserahkan kepada tim SDM <strong>maksimal 1 hari</strong> setelah personel kembali aktif bekerja</li></ol>'
        ]);

        $sick = TypeOfPermit::create([
            'name' => Str::upper('izin sakit'),
            'description' => '<ol><li>Surat Keterangan Sakit dapat digunakan apabila personel mengalami sakit dan mendapatkan surat rekomendasi dari dokter untuk beristirahat dirumah <strong>(BUKAN SURAT BEROBAT)</strong></li><li>Surat Keterangan Sakit harus berisi kop surat yang menyertakan <strong>nama tempat, alamat dan nomer telepon</strong> di mana surat dikeluarkan</li><li>Surat Keterangan Sakit harus di tanda tangani dan di stempel basah oleh dokter <strong>(BUKAN HASIL SCAN!!)</strong></li><li>Surat yang berasal melalui konsultasi kesehatan secara daring (online) <strong>tidak dapat dijadikan sebagai surat sakit</strong></li><li>Surat Keterangan Sakit yang tidak memenuhi ketentuan yang terdapat pada contoh gambar maka dianggap tidak sah</li><li>Surat Keterangan Sakit diserahkan kepada tim SDM <strong>maksimal 3 hari</strong> setelah personel kembali aktif bekerja</li><li><a href="https://bit.ly/Contoh_Surat_Keterangan_Sakit" rel="noopener noreferrer" target="_blank"><strong>CONTOH SURAT SAKIT YANG MEMENUHI KRITERIA</strong></a></li></ol>'
        ]);
    }
}
