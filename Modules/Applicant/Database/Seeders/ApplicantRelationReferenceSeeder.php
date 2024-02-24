<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Applicant\App\Models\ApplicantRelationReference;
use Illuminate\Database\Seeder;

class ApplicantRelationReferenceSeeder extends Seeder
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
            ApplicantRelationReference::factory(fake()->numberBetween(1, 4))->create([
                'applicant_resume_id' => $key->id
            ]);
        }
    }
}
