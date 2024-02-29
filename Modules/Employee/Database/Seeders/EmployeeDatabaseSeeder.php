<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            EmployeeSeeder::class,
            EmployeeAchievementSeeder::class,
            EmployeeAttachmentSeeder::class,
            EmployeeDetailSeeder::class,
            EmployeeContactSeeder::class,
            EmployeeContractSeeder::class,
            EmployeeEmergencyContactSeeder::class,
            EmployeeCertificateOfExpertiseSeeder::class,
            EmployeeEducationSeeder::class,
            EmployeeExperienceSeeder::class,
            EmployeeLanguageSkillSeeder::class,
            EmployeeMediaSocialSeeder::class,
            EmployeeOrganizationExperienceSeeder::class,
            EmployeeRelationReferenceSeeder::class,
        ]);

        // hr - employee attendance
        $this->call([
            EmployeeAttendanceSeeder::class,
        ]);

        // hr - employee permit
        $this->call([
            EmployeePermitRemainingSeeder::class,
            EmployeePermitStructureSeeder::class,
            EmployeePermitSeeder::class,
        ]);

        $this->call([
            EmployeeActivitySeeder::class,
        ]);
    }
}
