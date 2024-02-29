<?php

namespace Modules\Project\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Project\App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Project::factory(10)->create();
        for ($i = 1; $i < 5; $i++) {
            Project::updateOrCreate([
                'name' => 'Project ' . $i,
                'description' => fake()->realText(),
                'status' => 1,
                'start_date' => '2023-10-01',
                'end_date' => '2024-04-30',
                'max_apply' => $i,
            ]);
        }
    }
}
