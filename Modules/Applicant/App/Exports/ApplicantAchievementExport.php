<?php

namespace Modules\Applicant\App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicantAchievementExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.ApplicantAchievement', [
            'data' => $this->data
        ]);
    }
}
