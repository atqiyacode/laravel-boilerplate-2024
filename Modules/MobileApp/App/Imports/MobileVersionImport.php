<?php

namespace Modules\MobileApp\App\Imports;

use Modules\MobileApp\App\Models\MobileVersion;
use Maatwebsite\Excel\Concerns\ToModel;

class MobileVersionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MobileVersion([
            //
        ]);
    }
}
