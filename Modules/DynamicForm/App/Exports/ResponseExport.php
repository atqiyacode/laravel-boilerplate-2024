<?php

namespace Modules\DynamicForm\App\Exports;

use Modules\DynamicForm\App\Models\Response;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ResponseExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.Response', [
            'data' => $this->data
        ]);
    }
}
