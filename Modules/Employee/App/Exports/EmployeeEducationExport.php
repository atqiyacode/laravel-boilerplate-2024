<?php

namespace App\Exports;

use App\Models\EmployeeEducation;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeEducationExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.EmployeeEducation', [
            'data' => $this->data
        ]);
    }
}
