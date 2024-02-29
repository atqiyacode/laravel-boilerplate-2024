<?php

namespace Modules\Employee\Database\Seeders;

use Modules\Employee\App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\EmployeeRelationReference;
use Illuminate\Database\Seeder;

class EmployeeRelationReferenceSeeder extends Seeder
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
            \Modules\Employee\Database\Factories\EmployeeRelationReferenceFactory::new()->count(fake()->numberBetween(1, 3))->create();
        }
    }
}
