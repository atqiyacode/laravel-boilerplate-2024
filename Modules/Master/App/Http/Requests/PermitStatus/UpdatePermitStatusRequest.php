<?php

namespace App\Http\Requests\PermitStatus;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermitStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
        ];
    }
}
