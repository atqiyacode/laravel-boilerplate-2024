<?php

namespace Modules\JobApplication\App\Imports;

use Modules\JobApplication\App\Models\JobApplication;
use Maatwebsite\Excel\Concerns\ToModel;

class JobApplicationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JobApplication([
            //
        ]);
    }
}
