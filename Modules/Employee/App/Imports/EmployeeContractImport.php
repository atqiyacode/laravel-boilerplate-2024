<?php

namespace App\Imports;

use App\Models\EmployeeContract;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeContractImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeContract([
            //
        ]);
    }
}
