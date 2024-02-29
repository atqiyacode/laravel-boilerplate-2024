<?php

namespace Modules\DynamicForm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormQuestionPraRegistrationFactory extends Factory
{
    protected $model = \Modules\DynamicForm\App\Models\FormQuestionPraRegistration::class;
    public function definition(): array
    {
        return [
            'project_id' => createOrRandomFactory(\Modules\Project\App\Models\Project::class),
            'batch' => $this->faker->text(),
            'wilayah_tugas' => $this->faker->text(),
            'ingin_malanjutkan_pekerjaan' => $this->faker->text(),
            'ingin_posisi_yang_sama' => $this->faker->text(),
            'komitmen' => $this->faker->text(),
            'ketentuan' => $this->faker->text(),
            'kendala' => $this->faker->text(),
            'kesan_pesan' => $this->faker->text(),
            'kritik_saran' => $this->faker->text(),
            'other_fields' => $this->faker->text(),
        ];
    }
}
