<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\VerificationCodeType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VerificationCodeTypeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $list = [
            [
                'name' => 'login',
                'slug' => Str::slug('login'),
            ],
            [
                'name' => 'register',
                'slug' => Str::slug('register'),
            ],
            [
                'name' => 'forgot password',
                'slug' => Str::slug('forgot password'),
            ],
            [
                'name' => 'confirmation',
                'slug' => Str::slug('confirmation'),
            ],
            [
                'name' => 'resend login',
                'slug' => Str::slug('resend login'),
            ],
            [
                'name' => 'resend register',
                'slug' => Str::slug('resend register'),
            ],
            [
                'name' => 'resend forgot password',
                'slug' => Str::slug('resend forgot password'),
            ],
            [
                'name' => 'resend confirmation',
                'slug' => Str::slug('resend confirmation'),
            ],

        ];

        VerificationCodeType::upsert($list, ['name'], ['slug']);
    }
}
