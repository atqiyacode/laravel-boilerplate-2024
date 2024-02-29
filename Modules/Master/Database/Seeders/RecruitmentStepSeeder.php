<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\RecruitmentStep;
use Illuminate\Database\Seeder;

class RecruitmentStepSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        RecruitmentStep::factory(10)->create();
    }
}
