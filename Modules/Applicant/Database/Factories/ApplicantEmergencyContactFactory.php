<?php

namespace Modules\Applicant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantEmergencyContactFactory extends Factory
{
    protected $model = \Modules\Applicant\App\Models\ApplicantEmergencyContact::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'applicant_resume_id' => createOrRandomFactory(\Modules\Applicant\App\Models\ApplicantResume::class),
        ];
    }
}
