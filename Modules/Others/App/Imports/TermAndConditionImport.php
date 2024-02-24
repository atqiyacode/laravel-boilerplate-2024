<?php

namespace Modules\Others\App\Imports;

use Modules\Others\App\Models\TermAndCondition;
use Maatwebsite\Excel\Concerns\ToModel;

class TermAndConditionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TermAndCondition([
            //
        ]);
    }
}
