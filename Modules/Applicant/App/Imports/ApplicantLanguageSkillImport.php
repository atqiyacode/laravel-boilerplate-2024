<?php

namespace Modules\Applicant\App\Imports;

use Modules\Applicant\App\Models\ApplicantLanguageSkill;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicantLanguageSkillImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ApplicantLanguageSkill([
            //
        ]);
    }
}
