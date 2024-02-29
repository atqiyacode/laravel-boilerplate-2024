<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\LevelOfEducation;
use Illuminate\Database\Seeder;

class LevelOfEducationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        LevelOfEducation::updateOrCreate([
            'name' => 'D3',
            'description' => 'Diploma-III',
        ]);
        LevelOfEducation::updateOrCreate([
            'name' => 'D4',
            'description' => 'Diploma-IV',
        ]);
        LevelOfEducation::updateOrCreate([
            'name' => 'S1',
            'description' => 'Sarjana-I',
        ]);
        LevelOfEducation::updateOrCreate([
            'name' => 'S2',
            'description' => 'Sarjana-II',
        ]);
        LevelOfEducation::updateOrCreate([
            'name' => 'S3',
            'description' => 'Sarjana-III',
        ]);
    }
}
