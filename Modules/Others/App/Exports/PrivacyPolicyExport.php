<?php

namespace Modules\Others\App\Exports;

use Modules\Others\App\Models\PrivacyPolicy;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrivacyPolicyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PrivacyPolicy::all();
    }
}
