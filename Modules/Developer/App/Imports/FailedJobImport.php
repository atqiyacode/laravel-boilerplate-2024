<?php

namespace Modules\Developer\App\Imports;

use Modules\Developer\App\Models\FailedJob;
use Maatwebsite\Excel\Concerns\ToModel;

class FailedJobImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FailedJob([
            //
        ]);
    }
}
