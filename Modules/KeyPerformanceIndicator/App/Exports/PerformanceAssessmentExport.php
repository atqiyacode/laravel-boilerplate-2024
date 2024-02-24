<?php

namespace Modules\KeyPerformanceIndicator\App\Exports;

use Modules\KeyPerformanceIndicator\App\Models\PerformanceAssessment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PerformanceAssessmentExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.EmployeePerformanceAssessment', [
            'data' => $this->data
        ]);
    }
}
