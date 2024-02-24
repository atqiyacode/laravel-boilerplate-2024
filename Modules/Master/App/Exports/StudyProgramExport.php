<?php

namespace App\Exports;

use App\Models\StudyProgram;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class StudyProgramExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.StudyProgram', [
            'data' => $this->data
        ]);
    }
}
