<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeRelationReferenceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employee_id' => createOrRandomFactory(\App\Models\Employee::class),
            'nama' => $this->faker->name(),
            'jabatan' => $this->faker->jobTitle(),
            'no_telf' => $this->faker->phoneNumber(),
            'hubungan' => $this->faker->randomElement(['TEMAN', 'KAKAK', 'PAMAN', 'AYAH', 'IBU', 'SEPUPU', 'KEPONAKAN']),
        ];
    }
}
