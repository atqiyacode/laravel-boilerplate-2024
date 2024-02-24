<?php

namespace App\Imports;

use App\Models\CompanyInformation;
use Maatwebsite\Excel\Concerns\ToModel;

class CompanyInformationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CompanyInformation([
            //
        ]);
    }
}
