<?php

namespace App\Imports;

use App\Models\EmployeeDetail;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeDetailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeDetail([
            //
        ]);
    }
}
