<?php

namespace Modules\MobileApp\App\Http\Requests\MobileNews;

use Illuminate\Foundation\Http\FormRequest;

class CreateMobileNewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cover' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'status' => ['required', 'boolean'],
        ];
    }
}
