<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Database\Factories\UserNotificationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class UserNotificationSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        UserNotificationFactory::new()->count(500)->create();
    }
}
