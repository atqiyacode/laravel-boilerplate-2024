<?php

namespace Modules\Employee\App\Imports;

use Modules\Employee\App\Models\EmployeeDetail;
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
