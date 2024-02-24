<?php

namespace App\Imports;

use App\Models\EmployeeExperience;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeExperienceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeExperience([
            //
        ]);
    }
}
