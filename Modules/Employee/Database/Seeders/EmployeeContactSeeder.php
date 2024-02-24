<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeContact;
use Illuminate\Database\Seeder;

class EmployeeContactSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $employees = Employee::select(['id'])->get();
        $data = [];

        foreach ($employees as $key) {
            $data[] = [
                'phone' => fake()->phoneNumber(),
                'whatsapp' => fake()->phoneNumber(),
                'email' => fake()->safeEmail(),
                'employee_id' => $key->id,
            ];
        }

        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            EmployeeContact::upsert($chunk, ['employee_id'], null);
        }
    }
}
