<?php

namespace Database\Seeders;

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
        NotificationType::create([
            'name' => 'whatsapp notification',
            'description' => 'whatsapp notification',
            'status' => (bool) false,
        ]);
        NotificationType::create([
            'name' => 'email notification',
            'description' => 'email notification',
            'status' => (bool) true,
        ]);
        NotificationType::create([
            'name' => 'default notification',
            'description' => 'default notification',
            'status' => (bool) true,
        ]);
    }
}
