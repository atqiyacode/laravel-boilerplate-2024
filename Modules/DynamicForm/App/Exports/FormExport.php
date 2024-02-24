<?php

namespace Modules\DynamicForm\App\Exports;

use Modules\DynamicForm\App\Models\Form;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FormExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.Form', [
            'data' => $this->data
        ]);
    }
}
