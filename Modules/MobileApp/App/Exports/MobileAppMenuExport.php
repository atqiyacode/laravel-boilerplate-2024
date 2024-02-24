<?php

namespace Modules\MobileApp\App\Exports;

use Modules\MobileApp\App\Models\MobileAppMenu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MobileAppMenuExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.MobileAppMenu', [
            'data' => $this->data
        ]);
    }
}
