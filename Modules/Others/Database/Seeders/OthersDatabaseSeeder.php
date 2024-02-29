<?php

namespace Modules\Others\Database\Seeders;

use Illuminate\Database\Seeder;

class OthersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            FAQSeeder::class,
            PrivacyPolicySeeder::class,
            TermAndConditionSeeder::class,
        ]);
    }
}
