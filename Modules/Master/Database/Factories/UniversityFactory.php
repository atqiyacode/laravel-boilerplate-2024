<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\University::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'id_sp' => $this->faker->uuid(),
            'kode_pt' => $this->faker->uuid(),
        ];
    }
}
