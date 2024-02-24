<?php

namespace Modules\Others\App\Exports;

use Modules\Others\App\Models\TermAndCondition;
use Maatwebsite\Excel\Concerns\FromCollection;

class TermAndConditionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TermAndCondition::all();
    }
}
