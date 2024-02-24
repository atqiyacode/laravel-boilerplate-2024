<?php

namespace App\Imports;

use App\Models\EmployeeContact;
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
