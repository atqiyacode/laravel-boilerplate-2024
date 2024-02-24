<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\User\App\Models\UserVerificationCode;
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
        UserVerificationCode::factory(200)->create();
    }
}
