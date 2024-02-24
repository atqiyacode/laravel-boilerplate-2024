<?php

namespace Modules\Employee\App\Imports;

use Modules\Employee\App\Models\EmployeePermit;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeePermitImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeePermit([
            //
        ]);
    }
}
