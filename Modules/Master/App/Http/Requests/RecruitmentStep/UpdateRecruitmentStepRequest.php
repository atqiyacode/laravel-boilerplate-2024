<?php

namespace App\Http\Requests\RecruitmentStep;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecruitmentStepRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'icon' => ['required', 'string', 'max:255'],
        ];
    }
}
