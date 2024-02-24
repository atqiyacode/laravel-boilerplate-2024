<?php

namespace Modules\Others\App\Exports;

use Modules\Others\App\Models\FAQ;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FAQExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.FAQ', [
            'data' => $this->data
        ]);
    }
}
