<?php

namespace App\Imports;

use App\Models\EmployeeMediaSocial;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeMediaSocialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeMediaSocial([
            //
        ]);
    }
}
