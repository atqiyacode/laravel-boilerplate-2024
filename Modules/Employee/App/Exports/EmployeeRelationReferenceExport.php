<?php

namespace Modules\Employee\App\Exports;

use Modules\Employee\App\Models\EmployeeRelationReference;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeRelationReferenceExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.EmployeeRelationReference', [
            'data' => $this->data
        ]);
    }
}
