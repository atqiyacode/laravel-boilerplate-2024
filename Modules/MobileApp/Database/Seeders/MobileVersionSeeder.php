<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\MobileApp\App\Models\MobileVersion;
use Illuminate\Database\Seeder;

class MobileVersionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        MobileVersion::factory(2)->create();
    }
}
