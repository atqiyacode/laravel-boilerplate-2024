<?php

namespace Database\Seeders;

use Modules\Employee\App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\EmployeeLanguageSkill;
use Illuminate\Database\Seeder;

class EmployeeLanguageSkillSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 0; $i < Employee::count(); $i++) {
            EmployeeLanguageSkill::factory(fake()->numberBetween(1, 3))->create();
        }
    }
}
