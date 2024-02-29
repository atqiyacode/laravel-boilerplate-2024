<?php

namespace Modules\Applicant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantLanguageSkillFactory extends Factory
{
    protected $model = \Modules\Applicant\App\Models\ApplicantLanguageSkill::class;
    public function definition(): array
    {
        return [
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
            'bahasa' => $this->faker->randomElement([
                'Indonesia',
                'English',
                'Mandarin',
                'Rusia',
                'Korea',
                'British',
                'Arabian',
                'Spanish',
            ]),
            'kemampuan_lisan' => $this->faker->numberBetween(60, 100),
            'kemampuan_tulisan' => $this->faker->numberBetween(60, 100),
        ];
    }
}
