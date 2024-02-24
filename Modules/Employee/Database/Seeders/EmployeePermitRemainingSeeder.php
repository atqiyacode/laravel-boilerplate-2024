<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeePermitRemaining;
use Illuminate\Database\Seeder;

class EmployeePermitRemainingSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $employees = Employee::select('id')->get();
        $data = [];

        foreach ($employees as $key) {
            $used = fake()->numberBetween(0, 12);
            $total = 12 - $used;
            $data[] = [
                'has_use' => $used,
                'limit' => 12,
                'total' => $total,
                'note' => fake()->realText(),
                'employee_id' => $key->id,
            ];
        }

        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            EmployeePermitRemaining::upsert($chunk, ['employee_id'], null);
        }
    }
}
