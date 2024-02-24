<?php

namespace Modules\DynamicForm\App\Imports;

use Modules\DynamicForm\App\Models\FormField;
use Maatwebsite\Excel\Concerns\ToModel;

class FormFieldImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FormField([
            //
        ]);
    }
}
