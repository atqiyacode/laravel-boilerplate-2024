<?php

namespace Modules\DynamicForm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormPraRegistrationFactory extends Factory
{
    protected $model = \Modules\DynamicForm\App\Models\FormPraRegistration::class;
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'project_id' => createOrRandomFactory(\Modules\Project\App\Models\Project::class),
            'form_question_pra_registration_id' => createOrRandomFactory(\Modules\DynamicForm\App\Models\FormQuestionPraRegistration::class),
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
