<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\CompanyInformation;
use Illuminate\Database\Seeder;

class CompanyInformationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        CompanyInformation::create([
            'name' => 'MANAJEMEN PENYEDIA JASA',
            'logo' => '',
            'about_us' => '
            Kami adalah sebuah platform resmi yang dikelola oleh pemerintah [Nama Pemerintahan Anda], bertujuan untuk memberikan informasi yang akurat dan relevan kepada warga negara, mitra, dan pihak terkait. [Nama Website Anda] adalah wadah digital yang kami dedikasikan untuk memberikan akses mudah dan transparan terhadap layanan, program, dan informasi yang diselenggarakan oleh pemerintah
            ',
            'main_email' => 'callcenter.pajakdki@jakarta.go.id',
            'secondary_email' => '',
            'main_phone' => '021-3865580',
            'secondary_phone' => '021-3865585',
            'call_center' => '1500-177',
            'whatsapp_number' => '6281260006177',
            'website_aduan' => 'www.lapor.go.id',
            'location' => 'Jl. Abdul Muis No.66, Gambir, Jakarta Pusat',
            'longitude' => 106.81852976698596,
            'latitude' => -6.178003900095348,
        ]);
    }
}
