<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecruitmentStepFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\RecruitmentStep::class;
    public function definition(): array
    {
        return [
            'label' => $this->faker->firstName(),
			'description' => $this->faker->text(),
			'icon' => $this->faker->firstName(),
        ];
    }
}
