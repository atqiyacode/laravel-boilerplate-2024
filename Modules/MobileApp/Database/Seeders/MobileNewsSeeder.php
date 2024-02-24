<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\MobileApp\App\Models\MobileNews;
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
        MobileNews::factory(10)->create();
    }
}
