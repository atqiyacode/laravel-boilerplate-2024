<?php

namespace Modules\JobVacancy\App\Exports;

use Modules\JobVacancy\App\Models\JobVacancy;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JobVacancyExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.JobVacancy', [
            'data' => $this->data
        ]);
    }
}
