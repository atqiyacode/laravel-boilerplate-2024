<?php

namespace App\Http\Requests\VerificationCodeType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVerificationCodeTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
