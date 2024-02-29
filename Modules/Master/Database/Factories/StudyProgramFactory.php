<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudyProgramFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\StudyProgram::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'id_prodi' => $this->faker->firstName(),
			'kode_prodi' => $this->faker->firstName(),
        ];
    }
}
