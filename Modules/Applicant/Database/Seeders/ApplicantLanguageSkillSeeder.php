<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Applicant\App\Models\ApplicantLanguageSkill;
use Modules\Applicant\App\Models\ApplicantResume;
use Illuminate\Database\Seeder;

class ApplicantLanguageSkillSeeder extends Seeder
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
            ApplicantLanguageSkill::factory(fake()->numberBetween(1, 4))->create([
                'applicant_resume_id' => $key->id
            ]);
        }
    }
}
