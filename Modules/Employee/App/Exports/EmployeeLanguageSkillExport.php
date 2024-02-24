<?php

namespace Modules\Employee\App\Exports;

use Modules\Employee\App\Models\EmployeeLanguageSkill;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeLanguageSkillExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.EmployeeLanguageSkill', [
            'data' => $this->data
        ]);
    }
}
