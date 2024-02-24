<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Gender::create([
            'name' => 'male'
        ]);
        Gender::create([
            'name' => 'female'
        ]);
    }
}
