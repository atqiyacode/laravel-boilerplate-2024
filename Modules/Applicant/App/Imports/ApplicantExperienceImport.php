<?php

namespace Modules\Applicant\App\Imports;

use Modules\Applicant\App\Models\ApplicantExperience;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicantExperienceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ApplicantExperience([
            //
        ]);
    }
}
