<?php

namespace Modules\Applicant\App\Exports;

use Modules\Applicant\App\Models\ApplicantMediaSocial;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicantMediaSocialExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.ApplicantMediaSocial', [
            'data' => $this->data
        ]);
    }
}
