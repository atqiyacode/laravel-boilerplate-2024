<?php

namespace Modules\Applicant\App\Imports;

use Modules\Applicant\App\Models\ApplicantMediaSocial;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicantMediaSocialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ApplicantMediaSocial([
            //
        ]);
    }
}
