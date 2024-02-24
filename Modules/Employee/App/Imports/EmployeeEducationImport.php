<?php

namespace App\Imports;

use App\Models\EmployeeEducation;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeEducationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeEducation([
            //
        ]);
    }
}
