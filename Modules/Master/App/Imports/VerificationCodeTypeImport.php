<?php

namespace Modules\Master\App\Imports;

use Modules\Master\App\Models\VerificationCodeType;
use Maatwebsite\Excel\Concerns\ToModel;

class VerificationCodeTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new VerificationCodeType([
            //
        ]);
    }
}
