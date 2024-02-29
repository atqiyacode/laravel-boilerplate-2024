<?php

namespace Modules\MobileApp\Database\Seeders;

use Illuminate\Database\Seeder;

class MobileAppDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MobileServerSeeder::class,
            MobileAppMenuSeeder::class,
            MobileNewsSeeder::class,
            MobileVersionSeeder::class,
        ]);
    }
}
