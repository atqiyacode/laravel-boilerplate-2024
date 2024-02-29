<?php

namespace Modules\Notification\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Notification\App\Models\NotificationType;
use Illuminate\Database\Seeder;

class NotificationTypeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        NotificationType::updateOrCreate([
            'name' => 'whatsapp notification',
            'description' => 'whatsapp notification',
            'status' => (bool) false,
        ]);
        NotificationType::updateOrCreate([
            'name' => 'email notification',
            'description' => 'email notification',
            'status' => (bool) true,
        ]);
        NotificationType::updateOrCreate([
            'name' => 'default notification',
            'description' => 'default notification',
            'status' => (bool) true,
        ]);
    }
}
