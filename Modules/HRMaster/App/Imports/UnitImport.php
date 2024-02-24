<?php

namespace Modules\HRMaster\App\Imports;

use Modules\HRMaster\App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Unit([
            //
        ]);
    }
}
