<?php

namespace Modules\Others\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Others\App\Models\PrivacyPolicy;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PrivacyPolicy::updateOrCreate([
            'content' => '
            Kebijakan Privasi Aplikasi HRIS

            Terakhir diperbarui: [Tanggal Terakhir Diperbarui]

            Selamat datang di Aplikasi HRIS. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda. Dengan menggunakan Aplikasi HRIS, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini.

            1. Informasi yang Kami Kumpulkan

            Kami dapat mengumpulkan berbagai jenis informasi pribadi, termasuk tetapi tidak terbatas pada:
            - Nama
            - Alamat email
            - Informasi kontak
            - Data pribadi lainnya yang relevan dengan tujuan pengelolaan sumber daya manusia.

            2. Penggunaan Informasi

            Informasi yang kami kumpulkan dapat digunakan untuk:
            - Pengelolaan data karyawan
            - Pengelolaan gaji dan kehadiran
            - Penyediaan layanan dan dukungan teknis
            - Pengembangan dan perbaikan Aplikasi HRIS.

            3. Perlindungan Informasi

            Kami menjaga keamanan informasi pribadi Anda dengan menerapkan langkah-langkah keamanan yang sesuai. Namun, tidak ada metode transmisi atau penyimpanan data yang 100% aman. Kami berusaha keras untuk melindungi informasi pribadi Anda, tetapi kami tidak dapat menjamin keamanannya sepenuhnya.

            4. Berbagi Informasi

            Kami tidak akan menjual, menyewakan, atau menukar informasi pribadi Anda kepada pihak lain. Informasi Anda dapat dibagikan hanya dalam lingkup yang diperlukan untuk tujuan pengelolaan sumber daya manusia.

            5. Penggunaan Cookie

            Kami dapat menggunakan cookie atau teknologi serupa untuk meningkatkan pengalaman Anda menggunakan Aplikasi HRIS.

            6. Perubahan Kebijakan

            Kebijakan privasi ini dapat berubah dari waktu ke waktu. Perubahan akan diumumkan di situs web kami.

            7. Hak Anda

            Anda memiliki hak untuk mengakses, mengoreksi, atau menghapus informasi pribadi Anda. Jika Anda memiliki pertanyaan atau permintaan terkait informasi pribadi Anda, silakan hubungi kami.

            Kontak Kami:
            [Alamat Kontak]
            [Email Kontak]
            [No. Telepon Kontak]

            Kami sangat menghargai privasi Anda dan berkomitmen untuk melindunginya. Dengan menggunakan Aplikasi HRIS, Anda menyetujui kebijakan privasi ini. Terima kasih telah mempercayai kami.

            [Tanda Tangan Anda]

            [Tanggal]

            '
        ]);
    }
}
