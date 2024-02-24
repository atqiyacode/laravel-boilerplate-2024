<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\HRMaster\App\Models\MainClass;
use Illuminate\Database\Seeder;

class MainClassSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        MainClass::factory(10)->create();
    }
}
