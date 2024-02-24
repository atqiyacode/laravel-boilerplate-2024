<?php

namespace App\Imports;

use App\Models\EmployeePermitRemaining;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeePermitRemainingImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeePermitRemaining([
            //
        ]);
    }
}
