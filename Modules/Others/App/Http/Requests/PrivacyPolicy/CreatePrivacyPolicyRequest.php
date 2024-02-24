<?php

namespace Modules\Others\App\Http\Requests\PrivacyPolicy;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrivacyPolicyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required'],
        ];
    }
}
