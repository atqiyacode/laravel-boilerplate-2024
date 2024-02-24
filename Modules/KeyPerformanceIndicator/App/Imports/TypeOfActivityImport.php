<?php

namespace Modules\KeyPerformanceIndicator\Imports;

use Modules\KeyPerformanceIndicator\Models\TypeOfActivity;
use Maatwebsite\Excel\Concerns\ToModel;

class TypeOfActivityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TypeOfActivity([
            //
        ]);
    }
}
