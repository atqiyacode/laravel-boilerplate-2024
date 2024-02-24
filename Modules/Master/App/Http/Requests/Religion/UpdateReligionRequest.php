<?php

namespace App\Http\Requests\Religion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReligionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
