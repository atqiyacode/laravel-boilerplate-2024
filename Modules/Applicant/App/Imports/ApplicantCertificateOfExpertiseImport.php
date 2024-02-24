<?php

namespace Modules\Applicant\App\Imports;

use Modules\Applicant\App\Models\ApplicantCertificateOfExpertise;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicantCertificateOfExpertiseImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ApplicantCertificateOfExpertise([
            //
        ]);
    }
}
