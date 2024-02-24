<?php

namespace Modules\MobileApp\App\Imports;

use Modules\MobileApp\App\Models\MobileServer;
use Maatwebsite\Excel\Concerns\ToModel;

class MobileServerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MobileServer([
            //
        ]);
    }
}
