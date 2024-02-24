<?php

namespace Modules\Employee\App\Imports;

use Modules\Employee\App\Models\EmployeeContact;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeContactImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeContact([
            //
        ]);
    }
}
