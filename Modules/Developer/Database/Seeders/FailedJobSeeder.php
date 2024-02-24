<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Developer\App\Models\FailedJob;
use Illuminate\Database\Seeder;

class FailedJobSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        FailedJob::factory(10)->create();
    }
}
