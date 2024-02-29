<?php

namespace Modules\KeyPerformanceIndicator\App\Exports;

use Modules\KeyPerformanceIndicator\Modules\KeyPerformanceIndicator\App\Models\TypeOfActivity;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TypeOfActivityExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.TypeOfActivity', [
            'data' => $this->data
        ]);
    }
}
