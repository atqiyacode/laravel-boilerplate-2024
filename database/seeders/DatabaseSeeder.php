<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('passport:install');

        Artisan::call('module:seed Master');
        Artisan::call('module:seed Notification');
        Artisan::call('module:seed MobileApp');

        Artisan::call('module:seed Applicant');
        Artisan::call('module:seed HRMaster');

        Artisan::call('module:seed Others');
    }
}
