<?php

namespace Modules\Master\App\Http\Requests\VerificationCodeType;

use Illuminate\Foundation\Http\FormRequest;

class CreateVerificationCodeTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
