<?php

namespace Modules\DynamicForm\App\Imports;

use Modules\DynamicForm\App\Models\Response;
use Maatwebsite\Excel\Concerns\ToModel;

class ResponseImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Response([
            //
        ]);
    }
}
