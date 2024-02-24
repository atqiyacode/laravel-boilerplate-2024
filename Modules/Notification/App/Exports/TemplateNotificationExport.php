<?php

namespace Modules\Notification\App\Exports;

use Modules\Notification\App\Models\TemplateNotification;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TemplateNotificationExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.TemplateNotification', [
            'data' => $this->data
        ]);
    }
}
