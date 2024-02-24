<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\User\App\Models\Role;
use Modules\User\App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pjlpRole = Role::where('name', 'pjlp')->first();
        $uptakRole = Role::where('name', 'uptak')->first();

        $employeeRole = Role::where('name', 'employee')->first();
        $applicantRole = Role::where('name', 'applicant')->first();

        // sample for new applicant only
        for ($i = 0; $i < 2; $i++) {
            $applicant = User::factory()->create([
                'username' => 'sample-applicant' . $i + 1,
                'email' => 'applicant' . $i + 1 . '@email.com'
            ]);
            $applicant->assignRole([$applicantRole]);
        }

        // sample for uptak division
        $sampleUptakSdm = User::factory()->create([
            'username' => 'sample-uptak-hr-sdm',
            'email' => 'uptak-hr-sdm@email.com'
        ]);
        $sampleUptakSdm->assignRole([$employeeRole, $uptakRole]);

        $sampleUptakMonev = User::factory()->create([
            'username' => 'sample-uptak-monev',
            'email' => 'uptak-monev@email.com'
        ]);
        $sampleUptakMonev->assignRole([$employeeRole, $uptakRole]);

        $sampleUptakFinance = User::factory()->create([
            'username' => 'sample-uptak-finance',
            'email' => 'uptak-finance@email.com'
        ]);
        $sampleUptakFinance->assignRole([$employeeRole, $uptakRole]);

        $sampleUptakReport = User::factory()->create([
            'username' => 'sample-uptak-report',
            'email' => 'uptak-report@email.com'
        ]);
        $sampleUptakReport->assignRole([$employeeRole, $uptakRole]);

        // sample for pjlp division
        $samplePjlpSdm = User::factory()->create([
            'username' => 'sample-pjlp-hr-sdm',
            'email' => 'pjlp-hr-sdm@email.com'
        ]);
        $samplePjlpSdm->assignRole([$employeeRole, $pjlpRole]);

        $samplePjlpMonev = User::factory()->create([
            'username' => 'sample-pjlp-monev',
            'email' => 'pjlp-monev@email.com'
        ]);
        $samplePjlpMonev->assignRole([$employeeRole, $pjlpRole]);

        $samplePjlpFinance = User::factory()->create([
            'username' => 'sample-pjlp-finance',
            'email' => 'pjlp-finance@email.com'
        ]);
        $samplePjlpFinance->assignRole([$employeeRole, $pjlpRole]);

        $samplePjlpReport = User::factory()->create([
            'username' => 'sample-pjlp-report',
            'email' => 'pjlp-report@email.com'
        ]);
        $samplePjlpReport->assignRole([$employeeRole, $pjlpRole]);
    }
}
