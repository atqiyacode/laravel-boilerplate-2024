<?php

namespace Modules\MobileApp\App\Imports;

use Modules\MobileApp\App\Models\MobileAppMenu;
use Maatwebsite\Excel\Concerns\ToModel;

class MobileAppMenuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MobileAppMenu([
            //
        ]);
    }
}
