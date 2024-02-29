<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Database\Factories\UserVerificationCodeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class UserVerificationCodeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        UserVerificationCodeFactory::new()->count(200)->create();
    }
}
