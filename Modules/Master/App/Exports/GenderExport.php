<?php

namespace Modules\Master\App\Exports;

use Modules\Master\App\Models\Gender;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class GenderExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.Gender', [
            'data' => $this->data
        ]);
    }
}
