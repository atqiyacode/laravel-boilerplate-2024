<?php

namespace Modules\Master\App\Exports;

use Modules\Master\App\Models\CompanyInformation;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompanyInformationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CompanyInformation::all();
    }
}
