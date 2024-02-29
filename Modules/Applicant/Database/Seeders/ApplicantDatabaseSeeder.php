<?php

namespace Modules\Applicant\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class ApplicantDatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            // ProjectSeeder::class,
            // JobVacancySeeder::class,

            // FormQuestionPraRegistrationSeeder::class,

            ApplicantResumeSeeder::class,
            ApplicantExperienceSeeder::class,
            ApplicantEducationSeeder::class,
            ApplicantAchievementSeeder::class,
            ApplicantCertificateOfExpertiseSeeder::class,
            ApplicantContactSeeder::class,
            ApplicantLanguageSkillSeeder::class,
            ApplicantMediaSocialSeeder::class,
            ApplicantOrganizationExperienceSeeder::class,
            ApplicantRelationReferenceSeeder::class,
            ApplicantEmergencyContactSeeder::class,
            ApplicantAttachmentSeeder::class,

            // JobApplicationStatusSeeder::class,
            // JobApplicationSeeder::class,
        ]);
    }
}
