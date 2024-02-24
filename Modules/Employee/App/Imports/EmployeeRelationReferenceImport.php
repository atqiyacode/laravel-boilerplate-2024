<?php

namespace App\Imports;

use App\Models\EmployeeRelationReference;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeRelationReferenceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeRelationReference([
            //
        ]);
    }
}
