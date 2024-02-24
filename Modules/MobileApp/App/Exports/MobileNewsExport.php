<?php

namespace Modules\MobileApp\App\Exports;

use Modules\MobileApp\App\Models\MobileNews;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MobileNewsExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.MobileNews', [
            'data' => $this->data
        ]);
    }
}
