<?php

namespace Modules\Employee\App\Imports;

use Modules\Employee\App\Models\EmployeeAttendance;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeAttendanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeAttendance([
            //
        ]);
    }
}
