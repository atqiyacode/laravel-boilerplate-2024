<?php

namespace Modules\Master\App\Imports;

use Modules\Master\App\Models\RecruitmentStep;
use Maatwebsite\Excel\Concerns\ToModel;

class RecruitmentStepImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RecruitmentStep([
            //
        ]);
    }
}
