<?php

namespace Modules\Others\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Others\App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 1; $i < 15; $i++) {
            FAQ::updateOrCreate([
                'question' => fake()->text(20),
                'answer' => fake()->realText(),
                'status' => fake()->boolean()
            ]);
        }
    }
}
