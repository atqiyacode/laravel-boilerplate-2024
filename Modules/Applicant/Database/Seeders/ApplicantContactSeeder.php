<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Applicant\App\Models\ApplicantContact;
use Illuminate\Database\Seeder;

class ApplicantContactSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $applicantResumes = \App\Models\ApplicantResume::all();
        foreach ($applicantResumes as $key) {
            ApplicantContact::factory()->create([
                'applicant_resume_id' => $key->id
            ]);
        }
    }
}
