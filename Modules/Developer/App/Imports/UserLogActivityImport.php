<?php

namespace Modules\Developer\App\Imports;

use Modules\Developer\App\Models\UserLogActivity;
use Maatwebsite\Excel\Concerns\ToModel;

class UserLogActivityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserLogActivity([
            //
        ]);
    }
}
