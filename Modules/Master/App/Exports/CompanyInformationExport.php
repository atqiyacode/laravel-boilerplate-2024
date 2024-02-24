<?php

namespace App\Exports;

use App\Models\CompanyInformation;
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
