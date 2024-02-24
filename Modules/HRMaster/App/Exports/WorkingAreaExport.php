<?php

namespace Modules\HRMaster\App\Exports;

use Modules\HRMaster\App\Models\WorkingArea;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class WorkingAreaExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.WorkingArea', [
            'data' => $this->data
        ]);
    }
}
