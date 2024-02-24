<?php

namespace Modules\MobileApp\App\Http\Requests\MobileServer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMobileServerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', 'in:online,offline,maintenance'],
        ];
    }
}
