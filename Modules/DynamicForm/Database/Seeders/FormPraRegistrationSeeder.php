<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\DynamicForm\App\Models\FormPraRegistration;
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
        FormPraRegistration::factory(10)->create();
    }
}
