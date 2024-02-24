<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\DynamicForm\App\Models\ResponseData;
use Illuminate\Database\Seeder;

class ResponseDataSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ResponseData::factory(10)->create();
    }
}
