<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Notification\App\Models\TemplateNotification;
use Illuminate\Database\Seeder;

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
        TemplateNotification::factory(100)->create();
    }
}
