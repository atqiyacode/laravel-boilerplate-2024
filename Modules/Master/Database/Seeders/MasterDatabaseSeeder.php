<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;

class MasterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            SampleUserSeeder::class,
            DeveloperAccountSeeder::class,
            UserSeeder::class,
        ]);

        // indonesia location
        if (app()->isProduction()) {
            $this->call([
                ProvincesSeeder::class,
                CitiesSeeder::class,
                DistrictsSeeder::class,
                VillagesSeeder::class,
            ]);
        }
        $this->call([
            UniversitySeeder::class,
            // StudyProgramSeeder::class,
        ]);

        // master
        $this->call([
            EmployeeTypeSeeder::class,
            GenderSeeder::class,
            ReligionSeeder::class,
            LevelOfEducationSeeder::class,
            PermitStatusSeeder::class,
            VerificationCodeTypeSeeder::class,
        ]);
    }
}
