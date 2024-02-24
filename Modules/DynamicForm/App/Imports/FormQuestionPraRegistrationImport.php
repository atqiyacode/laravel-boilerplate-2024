<?php

namespace Modules\DynamicForm\App\Imports;

use Modules\DynamicForm\App\Models\FormQuestionPraRegistration;
use Maatwebsite\Excel\Concerns\ToModel;

class FormQuestionPraRegistrationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FormQuestionPraRegistration([
            //
        ]);
    }
}
