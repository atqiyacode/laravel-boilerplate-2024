<?php

namespace Modules\KeyPerformanceIndicator\App\Http\Requests\PerformanceAssessment;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerformanceAssessmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'poin' => ['required', 'integer'],
            'note' => ['required', 'string', 'max:255'],
        ];
    }
}
