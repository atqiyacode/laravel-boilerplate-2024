<?php

namespace Modules\HRMaster\App\Imports;

use Modules\HRMaster\App\Models\WorkingArea;
use Maatwebsite\Excel\Concerns\ToModel;

class WorkingAreaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new WorkingArea([
            //
        ]);
    }
}
