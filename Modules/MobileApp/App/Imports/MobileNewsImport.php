<?php

namespace Modules\MobileApp\App\Imports;

use Modules\MobileApp\App\Models\MobileNews;
use Maatwebsite\Excel\Concerns\ToModel;

class MobileNewsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MobileNews([
            //
        ]);
    }
}
