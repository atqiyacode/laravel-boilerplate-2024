<?php

namespace Modules\Applicant\App\Exports;

use Modules\Applicant\App\Models\ApplicantExperience;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicantExperienceExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.', [
            'data' => $this->data
        ]);
    }
}
