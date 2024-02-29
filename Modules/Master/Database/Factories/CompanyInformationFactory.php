<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyInformationFactory extends Factory
{
    protected $model = \Modules\Master\App\Models\CompanyInformation::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'logo' => $this->faker->firstName(),
			'about_us' => $this->faker->text(),
			'main_email' => $this->faker->safeEmail(),
			'secondary_email' => $this->faker->safeEmail(),
			'main_phone' => $this->faker->firstName(),
			'secondary_phone' => $this->faker->firstName(),
			'call_center' => $this->faker->firstName(),
			'website_aduan' => $this->faker->firstName(),
			'whatsapp_number' => $this->faker->firstName(),
			'location' => $this->faker->firstName(),
			'longitude' => $this->faker->firstName(),
			'latitude' => $this->faker->firstName(),
        ];
    }
}
