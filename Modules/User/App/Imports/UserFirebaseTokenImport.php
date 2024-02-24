<?php

namespace Modules\User\App\Imports;

use Modules\User\App\Models\UserFirebaseToken;
use Maatwebsite\Excel\Concerns\ToModel;

class UserFirebaseTokenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserFirebaseToken([
            //
        ]);
    }
}
