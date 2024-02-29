<?php

namespace Modules\HRMaster\Database\Seeders;

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
        for ($i = 1; $i < 11; $i++) {
            MainClass::updateOrCreate([
                'name' => 'GOLONGAN ' . $i,
                'description' => 'Description ' . $i,
                'status' => (bool) true
            ]);
        }
    }
}
