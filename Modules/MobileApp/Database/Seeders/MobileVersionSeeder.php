<?php

namespace Modules\MobileApp\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Modules\MobileApp\Database\Factories\MobileVersionFactory;

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
        MobileVersionFactory::new()->count(2)->create();
    }
}
