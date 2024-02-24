<?php

namespace App\Imports;

use App\Models\EmployeeEmergencyContact;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeEmergencyContactImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeEmergencyContact([
            //
        ]);
    }
}
