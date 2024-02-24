<?php

namespace Modules\User\App\Http\Requests\UserVerificationCode;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserVerificationCodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'verification_code_type_id' => ['required'],
            'token_code' => ['required', 'string', 'max:255'],
            'expired_at' => ['required', 'date'],
        ];
    }
}
