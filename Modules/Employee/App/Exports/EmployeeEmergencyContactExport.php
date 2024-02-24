<?php

namespace Modules\Employee\App\Exports;

use Modules\Employee\App\Models\EmployeeEmergencyContact;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeEmergencyContactExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.EmployeeEmergencyContact', [
            'data' => $this->data
        ]);
    }
}
