<?php

namespace Modules\DynamicForm\App\Imports;

use Modules\DynamicForm\App\Models\FormPraRegistration;
use Maatwebsite\Excel\Concerns\ToModel;

class FormPraRegistrationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FormPraRegistration([
            //
        ]);
    }
}
