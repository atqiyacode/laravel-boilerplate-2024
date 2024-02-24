<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Applicant\App\Models\ApplicantResume;
use Modules\Applicant\App\Models\Gender;
use Modules\Applicant\App\Models\Religion;
use Modules\Applicant\App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantResumeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $gender = collect(Gender::all());
        $religion = collect(Religion::all());
        // $users = User::select('id', 'username', 'name')->get();
        $users = User::role('applicant')->get();

        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'user_id' => $user->id,
                'nik' => $user->username,
                'religion_id' => $religion->random()->id,
                'gender_id' => $gender->random()->id,
                'nama_lengkap' => $user->name,
                'tempat_lahir' => fake()->city(),
                'tanggal_lahir' => fake()->dateTimeBetween('-30 years', '-17 years'),
                'alamat_domisili' => fake()->address(),
                'alamat_ktp' => fake()->address(),
                'tentang_diri' => 'Seorang yang bersemangat dalam pekerjaan.',
                'other_fields' => null,
                'foto_ktp' => fake()->imageUrl(),
                'foto_npwp' => fake()->imageUrl(),
                'foto_pasfoto' => fake()->imageUrl(),
                'foto_selfie' => fake()->imageUrl(),
                'foto_kswp' => fake()->imageUrl(),
                'foto_cv' => fake()->imageUrl(),
            ];
        }

        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            ApplicantResume::insert($chunk);
        }
    }
}
