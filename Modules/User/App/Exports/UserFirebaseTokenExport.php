<?php

namespace Modules\User\App\Exports;

use Modules\User\App\Models\UserFirebaseToken;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserFirebaseTokenExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.UserFirebaseToken', [
            'data' => $this->data
        ]);
    }
}
