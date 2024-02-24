<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\DynamicForm\App\Models\Response;
use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Response::factory(10)->create();
    }
}
