<?php

namespace Modules\Applicant\App\Exports;

use Modules\Applicant\App\Models\ApplicantRelationReference;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicantRelationReferenceExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.ApplicantRelationReference', [
            'data' => $this->data
        ]);
    }
}
