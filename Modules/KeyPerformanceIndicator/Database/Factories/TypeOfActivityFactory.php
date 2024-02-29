<?php

namespace Modules\KeyPerformanceIndicator\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeOfActivityFactory extends Factory
{
    protected $model = \Modules\KeyPerformanceIndicator\App\Models\TypeOfActivity::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'note' => $this->faker->text(),
            'field_of_work_id' => createOrRandomFactory(\Modules\HRMaster\App\Models\FieldOfWork::class),
        ];
    }
}
