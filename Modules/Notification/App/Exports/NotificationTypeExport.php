<?php

namespace Modules\Notification\App\Exports;

use Modules\Notification\App\Models\NotificationType;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class NotificationTypeExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.NotificationType', [
            'data' => $this->data
        ]);
    }
}
