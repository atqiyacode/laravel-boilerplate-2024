<?php

namespace Modules\User\App\Exports;

use Modules\User\App\Models\UserVerificationCode;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserVerificationCodeExport implements FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.UserVerificationCode', [
            'data' => $this->data
        ]);
    }
}
