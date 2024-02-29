<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReligionFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\Religion::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
        ];
    }
}
