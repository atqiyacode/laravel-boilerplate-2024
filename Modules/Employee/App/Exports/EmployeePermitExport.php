<?php

namespace App\Exports;

use App\Models\EmployeePermit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeePermitExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.EmployeePermit', [
            'data' => $this->data
        ]);
    }
}
