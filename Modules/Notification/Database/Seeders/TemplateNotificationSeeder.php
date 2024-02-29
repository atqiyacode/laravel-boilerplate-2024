<?php

namespace Modules\Notification\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Modules\Notification\Database\Factories\TemplateNotificationFactory;

class TemplateNotificationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TemplateNotificationFactory::new()->count(100)->create();
    }
}
