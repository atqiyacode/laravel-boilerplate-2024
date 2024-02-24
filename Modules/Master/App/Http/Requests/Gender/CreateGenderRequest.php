<?php

namespace Modules\Master\App\Http\Requests\Gender;

use Illuminate\Foundation\Http\FormRequest;

class CreateGenderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
