<?php

namespace Modules\Others\App\Http\Requests\FAQ;

use Illuminate\Foundation\Http\FormRequest;

class CreateFAQRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required'],
            'status' => ['required', 'boolean'],
        ];
    }
}
