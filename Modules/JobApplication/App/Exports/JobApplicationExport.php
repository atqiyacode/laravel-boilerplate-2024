<?php

namespace Modules\JobApplication\App\Exports;

use Modules\JobApplication\App\Models\JobApplication;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JobApplicationExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.JobApplication', [
            'data' => $this->data
        ]);
    }
}
