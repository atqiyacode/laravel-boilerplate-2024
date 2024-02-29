<?php

namespace Modules\HRMaster\Database\Seeders;

use Illuminate\Database\Seeder;

class HRMasterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UnitSeeder::class,
            PositionSeeder::class,
            FieldOfWorkSeeder::class,
            MainClassSeeder::class,
            WorkingAreaSeeder::class,
            TypeOfPermitSeeder::class,
        ]);
    }
}
