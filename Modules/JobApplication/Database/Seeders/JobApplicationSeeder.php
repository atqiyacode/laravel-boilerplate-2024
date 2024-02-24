<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\JobApplication\App\Models\ApplicantResume;
use Modules\JobApplication\App\Models\JobApplication;
use Modules\JobApplication\App\Models\JobApplicationStatus;
use Modules\JobApplication\App\Models\JobVacancy;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $jobApplicationStatus = collect(JobApplicationStatus::all())->random();
        $resumesData = ApplicantResume::select('id', 'user_id')->get(); // Fetch the ApplicantResume data

        $jv = JobVacancy::pluck('id')->all();

        shuffle($jv); // Randomize the job vacancy IDs

        foreach ($resumesData as $resume) {
            $randomJobVacancyIds = array_slice($jv, 0, rand(1, 5)); // Random number of job vacancy IDs
            $data = [];
            foreach ($randomJobVacancyIds as $jobVacancyId) {
                $data[] = [
                    "job_vacancy_id" => $jobVacancyId,
                    "applicant_resume_id" => $resume->id,
                    "status" => $jobApplicationStatus->id,
                    "keterangan" => null,
                    "referal" => null,
                    "user_id" => $resume->user_id
                ];
            }
            $chunks = array_chunk($data, 100);
            foreach ($chunks as $chunk) {
                JobApplication::insert($chunk);
            }
        }
    }
}
