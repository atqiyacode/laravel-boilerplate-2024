<?php

namespace Modules\Master\App\Exports;

use Modules\Master\App\Models\PermitStatus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PermitStatusExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.PermitStatus', [
            'data' => $this->data
        ]);
    }
}
