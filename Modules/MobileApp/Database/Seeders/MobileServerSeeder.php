<?php

namespace Modules\MobileApp\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\MobileApp\App\Models\MobileServer;
use Illuminate\Database\Seeder;

class MobileServerSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        MobileServer::updateOrCreate([
            'status' => 'online'
        ]);
    }
}
