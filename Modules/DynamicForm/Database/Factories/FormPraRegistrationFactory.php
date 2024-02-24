<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormPraRegistrationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\App\Models\ApplicantResume::class),
			'project_id' => createOrRandomFactory(\App\Models\Project::class),
			'form_question_pra_registration_id' => createOrRandomFactory(\App\Models\FormQuestionPraRegistration::class),
			'batch' => $this->faker->randomNumber(),
			'wilayah_tugas' => $this->faker->firstName(),
			'ingin_malanjutkan_pekerjaan' => $this->faker->boolean(),
			'ingin_posisi_yang_sama' => $this->faker->boolean(),
			'komitmen' => $this->faker->boolean(),
			'ketentuan' => $this->faker->boolean(),
			'kendala' => $this->faker->text(),
			'kesan_pesan' => $this->faker->text(),
			'kritik_saran' => $this->faker->text(),
        ];
    }
}
