<?php

namespace Modules\MobileApp\App\Exports;

use Modules\MobileApp\App\Models\MobileServer;
use Maatwebsite\Excel\Concerns\FromCollection;

class MobileServerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MobileServer::all();
    }
}
