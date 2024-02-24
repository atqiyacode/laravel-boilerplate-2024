<?php

namespace Modules\KeyPerformanceIndicator\Imports;

use Modules\KeyPerformanceIndicator\Models\PerformanceAssessment;
use Maatwebsite\Excel\Concerns\ToModel;

class PerformanceAssessmentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PerformanceAssessment([
            //
        ]);
    }
}
