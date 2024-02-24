<?php

namespace Modules\MobileApp\App\Exports;

use Modules\MobileApp\App\Models\MobileVersion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MobileVersionExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.MobileVersion', [
            'data' => $this->data
        ]);
    }
}
