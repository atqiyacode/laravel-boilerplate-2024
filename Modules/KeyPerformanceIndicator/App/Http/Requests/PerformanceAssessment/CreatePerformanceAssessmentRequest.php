<?php

namespace Modules\KeyPerformanceIndicator\Http\Requests\PerformanceAssessment;

use Illuminate\Foundation\Http\FormRequest;

class CreatePerformanceAssessmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'poin' => ['required', 'integer'],
            'note' => ['nullable', 'string', 'max:255'],
        ];
    }
}
