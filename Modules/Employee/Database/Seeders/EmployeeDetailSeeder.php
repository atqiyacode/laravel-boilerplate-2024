<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Models\EmployeeDetail;
use Illuminate\Database\Seeder;

class EmployeeDetailSeeder extends Seeder
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
                'id_card' => fake()->uuid(),
                'npwp' => fake()->uuid(),
                'account_number' => fake()->uuid(),
                'online_attendance' => fake()->boolean(),
                'employee_id' => $key->id,

                'tipe_penyedia_jasa' => (rand(0, 1) === 0) ? 'JK' : 'JL',
                'kontrak_ke' => 1,
                'status_personil' => null,
                'tanggal_mulai_kerja' => date('Y-m-d', mt_rand(strtotime('2010-01-01'), time()))
            ];
        }

        $chunks = array_chunk($data, 100);

        foreach ($chunks as $chunk) {
            EmployeeDetail::upsert($chunk, ['employee_id'], null);
        }
    }
}
