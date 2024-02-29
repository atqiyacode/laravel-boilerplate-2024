<?php

namespace Modules\DynamicForm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
{
    protected $model = \Modules\DynamicForm\App\Models\Response::class;
    public function definition(): array
    {
        return [
            'form_id' => createOrRandomFactory(\Modules\DynamicForm\App\Models\Form::class),
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
        ];
    }
}
