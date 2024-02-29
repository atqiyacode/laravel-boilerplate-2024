<?php

namespace Modules\Others\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Others\App\Models\TermAndCondition;
use Illuminate\Database\Seeder;

class TermAndConditionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TermAndCondition::updateOrCreate([
            'content' => '<h2><strong>Syarat dan Ketentuan Umum HRIS﻿</strong></h2><p><br></p><p><strong>Lisensi dan Penggunaan:</strong></p><ol><li><em>Penggunaan HRIS terbatas pada perusahaan dan pengguna yang telah diberikan izin oleh administrator.</em></li><li><em>Larangan berbagi akses dengan pengguna yang tidak berwenang.</em></li><li><em>Penyalinan, reproduksi, atau distribusi kode sumber atau aplikasi HRIS dilarang tanpa izin tertulis.</em></li></ol><p><br></p><p><strong>Kerahasiaan Data:</strong></p><ol><li>Seluruh data karyawan, gaji, kehadiran, dan informasi pribadi lainnya harus dijaga kerahasiaannya.</li><li>Akses ke informasi harus diatur sesuai peran dan tanggung jawab masing-masing pengguna.</li></ol><p><br></p><p><strong>Keamanan Data:</strong></p><ol><li>Penggunaan kata sandi yang kuat dan penggunaan fitur keamanan lainnya diperlukan untuk melindungi data.</li><li>Tindakan pencegahan keamanan seperti enkripsi data harus diterapkan.</li></ol><p><br></p><p><strong>Penggunaan Wajar:</strong></p><ol><li>Penggunaan HRIS harus sesuai dengan tujuan pengelolaan sumber daya manusia dan tidak boleh digunakan untuk tujuan yang melanggar hukum atau merugikan perusahaan atau individu lainnya..</li></ol><p><br></p><p><strong>Pemeliharaan dan Pembaruan:</strong></p><ol><li>Administrator bertanggung jawab untuk pemeliharaan dan pembaruan rutin HRIS.</li><li>Pembaruan perangkat lunak harus dilakukan secara teratur untuk menjaga keamanan dan kinerja sistem.</li></ol><p><br></p><p><strong>Dukungan Teknis:</strong></p><ol><li>Layanan dukungan teknis akan disediakan dalam hal masalah teknis, bug, atau pertanyaan penggunaan.</li></ol><p><br></p><p><strong>Tanggung Jawab Hukum:</strong></p><ol><li>Pihak pengembang HRIS tidak bertanggung jawab atas kerugian atau masalah yang timbul akibat penggunaan HRIS.</li><li>Pengguna harus menyetujui bahwa syarat dan ketentuan dapat berubah seiring waktu, dan perubahan akan diberitahukan kepada pengguna.</li></ol><p><br></p><p><strong>Perubahan Syarat dan Ketentuan:</strong></p><ol><li>Pengguna harus menyetujui bahwa syarat dan ketentuan dapat berubah seiring waktu, dan perubahan akan diberitahukan kepada pengguna.</li></ol>'
        ]);
    }
}
