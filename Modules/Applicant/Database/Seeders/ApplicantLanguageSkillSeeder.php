<?php

namespace Modules\Applicant\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $applicantResumes = \Modules\Applicant\App\Models\ApplicantResume::all();
        foreach ($applicantResumes as $key) {
            \Modules\Applicant\Database\Factories\ApplicantLanguageSkillFactory::new()->count(fake()->numberBetween(1, 4))->create([
                'applicant_resume_id' => $key->id
            ]);
        }
    }
}
