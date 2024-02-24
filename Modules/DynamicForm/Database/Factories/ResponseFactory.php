<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'form_id' => createOrRandomFactory(\App\Models\Form::class),
			'applicant_resume_id' => createOrRandomFactory(\App\Models\ApplicantResume::class),
        ];
    }
}
