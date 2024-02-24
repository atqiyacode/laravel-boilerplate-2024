<?php

namespace Modules\Applicant\App\Imports;

use Modules\Applicant\App\Models\ApplicantAchievement;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicantAchievementImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ApplicantAchievement([
            //
        ]);
    }
}
