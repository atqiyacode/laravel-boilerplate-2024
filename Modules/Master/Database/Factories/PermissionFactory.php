<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\Permission::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'guard_name' => $this->faker->firstName(),
        ];
    }
}
