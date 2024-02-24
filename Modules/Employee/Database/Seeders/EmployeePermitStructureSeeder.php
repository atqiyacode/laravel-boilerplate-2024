<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Employee\App\Models\EmployeePermitStructure;
use Illuminate\Database\Seeder;

class EmployeePermitStructureSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $ar = [
            [1, 1, 2, 3],
            [4, 1, 1, 3],
            [5, 1, 4, 1],
            // [6,2,1],
            // [7,2,1],
            // [8,6,1],
            // [9,7,1],
            // [10,5,4],
            // [,,],
        ];
        foreach ($ar as $key => $value) {
            $ps = new EmployeePermitStructure();
            $ps->position_id = $value[0];
            $ps->working_area_id = $value[1];
            $ps->approval_1 = $value[2];
            $ps->approval_2 = $value[3];
            $ps->save();
        }
    }
}
