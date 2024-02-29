<?php

namespace Modules\Applicant\App\Imports;

use Modules\Applicant\App\Models\ApplicantResume;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicantResumeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ApplicantResume([
            //
        ]);
    }
}
