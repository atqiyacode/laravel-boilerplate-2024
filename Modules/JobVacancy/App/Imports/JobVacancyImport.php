<?php

namespace Modules\JobVacancy\App\Imports;

use Modules\JobVacancy\App\Models\JobVacancy;
use Maatwebsite\Excel\Concerns\ToModel;

class JobVacancyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JobVacancy([
            //
        ]);
    }
}
