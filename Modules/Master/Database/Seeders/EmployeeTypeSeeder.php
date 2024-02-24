<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\EmployeeType;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        EmployeeType::create([
            'name' => 'PJLP',
            'status' => true,
        ]);

        EmployeeType::create([
            'name' => 'UPTAK',
            'status' => true,
        ]);
    }
}
