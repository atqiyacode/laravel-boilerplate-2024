<?php

namespace App\Http\Requests\LevelOfEducation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLevelOfEducationRequest extends FormRequest
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
