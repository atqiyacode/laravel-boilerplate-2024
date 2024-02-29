<?php

namespace Modules\Applicant\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Applicant\App\Models\ApplicantAchievement;
use Illuminate\Database\Seeder;

class ApplicantAchievementSeeder extends Seeder
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
            \Modules\Applicant\Database\Factories\ApplicantAchievementFactory::new()->count(fake()->numberBetween(1, 4))->create([
                'applicant_resume_id' => $key->id
            ]);
        }
    }
}
