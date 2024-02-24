<?php

namespace App\Imports;

use App\Models\EmployeeType;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeType([
            //
        ]);
    }
}
