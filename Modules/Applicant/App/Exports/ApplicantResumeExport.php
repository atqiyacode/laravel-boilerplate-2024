<?php

namespace Modules\Applicant\App\Exports;

use Modules\Applicant\App\Models\ApplicantResume;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicantResumeExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.ApplicantResume', [
            'data' => $this->data
        ]);
    }
}
