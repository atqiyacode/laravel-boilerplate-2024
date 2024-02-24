<?php

namespace Modules\User\App\Http\Requests\UserFirebaseToken;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserFirebaseTokenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'device_token' => ['required', 'string', 'max:255'],
        ];
    }
}
