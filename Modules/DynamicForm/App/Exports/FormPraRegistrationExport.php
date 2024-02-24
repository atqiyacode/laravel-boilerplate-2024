<?php

namespace Modules\DynamicForm\App\Exports;

use Modules\DynamicForm\App\Models\FormPraRegistration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FormPraRegistrationExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.FormPraRegistration', [
            'data' => $this->data
        ]);
    }
}
