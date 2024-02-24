<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\User\App\Models\User;
use Modules\User\App\Models\UserFirebaseToken;
use Illuminate\Database\Seeder;

class UserFirebaseTokenSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = User::select('id')->get();
        $data = [];

        foreach ($users as $key) {
            $data[] = [
                'user_id' => $key->id,
                'device_token' => fake()->uuid(),
            ];
        }
        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            UserFirebaseToken::upsert($chunk, ['user_id'], null);
        }
    }
}
