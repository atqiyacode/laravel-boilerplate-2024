<?php

namespace Modules\MobileApp\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\MobileApp\Database\Factories\MobileNewsFactory;
use Illuminate\Database\Seeder;

class MobileNewsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        MobileNewsFactory::new()->count(10)->create();
    }
}
