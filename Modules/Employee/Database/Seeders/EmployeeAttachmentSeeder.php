<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeAttachment;
use Illuminate\Database\Seeder;

class EmployeeAttachmentSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // EmployeeAttachment::factory(10)->create();
        // Retrieve all employee IDs in one query
        $employeeIds = Employee::pluck('id')->all();

        // Create an array of attachment data
        $attachmentData = [];

        foreach ($employeeIds as $employeeId) {
            $attachmentData[] = [
                'employee_id' => $employeeId,
                'foto_ktp' => fake()->imageUrl(),
                'foto_npwp' => fake()->imageUrl(),
                'foto_pasfoto' => fake()->imageUrl(),
                'foto_selfie' => fake()->imageUrl(),
                'foto_kswp' => fake()->imageUrl(),
                'foto_cv' => fake()->imageUrl(),
            ];
        }


        $chunks = array_chunk($attachmentData, 100);

        foreach ($chunks as $chunk) {
            EmployeeAttachment::insert($chunk);
        }
    }
}
