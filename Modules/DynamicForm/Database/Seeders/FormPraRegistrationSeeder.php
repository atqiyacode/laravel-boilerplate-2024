<?php

namespace Modules\DynamicForm\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormPraRegistrationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \Modules\DynamicForm\Database\Factories\FormPraRegistrationFactory::new()->count(10)->create();
    }
}
