<?php

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeLanguageSkillFactory extends Factory
{
    protected $model = \Modules\Employee\App\Models\EmployeeLanguageSkill::class;

    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\Modules\Employee\App\Models\Employee::class),
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
