<?php

namespace Modules\JobApplication\App\Imports;

use Modules\JobApplication\App\Models\JobApplicationStatus;
use Maatwebsite\Excel\Concerns\ToModel;

class JobApplicationStatusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JobApplicationStatus([
            //
        ]);
    }
}
