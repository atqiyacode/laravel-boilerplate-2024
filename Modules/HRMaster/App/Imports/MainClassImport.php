<?php

namespace Modules\HRMaster\App\Imports;

use Modules\HRMaster\App\Models\MainClass;
use Maatwebsite\Excel\Concerns\ToModel;

class MainClassImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MainClass([
            //
        ]);
    }
}
