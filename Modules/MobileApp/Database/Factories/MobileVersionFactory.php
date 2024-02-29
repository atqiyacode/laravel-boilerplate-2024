<?php

namespace Modules\MobileApp\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileVersionFactory extends Factory
{
    protected $model = \Modules\MobileApp\App\Models\MobileVersion::class;

    public function definition(): array
    {
        return [
            'version' => $this->faker->semver(true, true),
            'version_code' => $this->faker->semver(),
            'note' => $this->faker->realText(),
            'device' => $this->faker->randomElement(['iphone', 'android']),
            'status' => $this->faker->boolean(),
            'package_file' => $this->faker->url(),
            'download_link' => $this->faker->url(),
        ];
    }
}
