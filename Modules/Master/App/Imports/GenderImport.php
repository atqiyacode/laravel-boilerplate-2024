<?php

namespace App\Imports;

use App\Models\Gender;
use Maatwebsite\Excel\Concerns\ToModel;

class GenderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Gender([
            //
        ]);
    }
}
