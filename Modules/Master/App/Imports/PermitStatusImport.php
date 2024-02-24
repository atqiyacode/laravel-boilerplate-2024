<?php

namespace App\Imports;

use App\Models\PermitStatus;
use Maatwebsite\Excel\Concerns\ToModel;

class PermitStatusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PermitStatus([
            //
        ]);
    }
}
