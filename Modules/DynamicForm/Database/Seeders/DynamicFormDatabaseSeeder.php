<?php

namespace Modules\DynamicForm\Database\Seeders;

use Illuminate\Database\Seeder;

class DynamicFormDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            FormQuestionPraRegistrationSeeder::class,
            FormPraRegistrationSeeder::class,
            FormSeeder::class,
            FormFieldSeeder::class,
            ResponseSeeder::class,
            OptionSeeder::class,
            ResponseDataSeeder::class,
        ]);
    }
}
