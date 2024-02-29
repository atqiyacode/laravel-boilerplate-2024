<?php

namespace Modules\Applicant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantMediaSocialFactory extends Factory
{
    protected $model = \Modules\Applicant\App\Models\ApplicantMediaSocial::class;
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'nama_media' => $this->faker->randomElement([
                'FACEBOOK',
                'TWITTER',
                'INSTAGRAM',
                'TIK-TOK',
                'YOUTUBE',
            ]),
            'link' => $this->faker->url(),
        ];
    }
}
