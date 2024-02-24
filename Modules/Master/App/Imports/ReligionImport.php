<?php

namespace Modules\Master\App\Imports;

use Modules\Master\App\Models\Religion;
use Maatwebsite\Excel\Concerns\ToModel;

class ReligionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Religion([
            //
        ]);
    }
}
