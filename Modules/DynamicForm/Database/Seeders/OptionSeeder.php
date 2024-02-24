<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\DynamicForm\App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Option::factory(10)->create();
    }
}
