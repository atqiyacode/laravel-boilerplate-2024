<?php

namespace Modules\HRMaster\App\Imports;

use Modules\HRMaster\App\Models\TypeOfPermit;
use Maatwebsite\Excel\Concerns\ToModel;

class TypeOfPermitImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TypeOfPermit([
            //
        ]);
    }
}
