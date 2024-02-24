<?php

namespace Modules\Applicant\App\Exports;

use Modules\Applicant\App\Models\ApplicantOrganizationExperience;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicantOrganizationExperienceExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.ApplicantOrganizationExperience', [
            'data' => $this->data
        ]);
    }
}
