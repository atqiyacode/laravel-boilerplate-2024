<?php

namespace Modules\HRMaster\App\Imports;

use Modules\HRMaster\App\Models\FieldOfWork;
use Maatwebsite\Excel\Concerns\ToModel;

class FieldOfWorkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FieldOfWork([
            //
        ]);
    }
}
