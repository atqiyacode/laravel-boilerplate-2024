<?php

namespace Modules\DynamicForm\App\Exports;

use Modules\DynamicForm\App\Models\Option;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OptionExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.Option', [
            'data' => $this->data
        ]);
    }
}
