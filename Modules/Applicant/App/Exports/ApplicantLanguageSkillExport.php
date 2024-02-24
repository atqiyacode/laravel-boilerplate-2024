<?php

namespace Modules\Applicant\App\Exports;

use Modules\Applicant\App\Models\ApplicantLanguageSkill;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicantLanguageSkillExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.ApplicantLanguageSkill', [
            'data' => $this->data
        ]);
    }
}
