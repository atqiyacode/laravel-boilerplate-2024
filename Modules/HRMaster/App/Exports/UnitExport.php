<?php

namespace Modules\HRMaster\App\Exports;

use Modules\HRMaster\App\Models\Unit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UnitExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.Unit', [
            'data' => $this->data
        ]);
    }
}
