<?php

namespace Modules\Developer\App\Exports;

use Modules\Developer\App\Models\FailedJob;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FailedJobExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.FailedJob', [
            'data' => $this->data
        ]);
    }
}
