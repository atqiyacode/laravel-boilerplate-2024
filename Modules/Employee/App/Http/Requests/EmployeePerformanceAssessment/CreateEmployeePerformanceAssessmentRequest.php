<?php

namespace App\Http\Requests\EmployeePerformanceAssessment;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeePerformanceAssessmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'poin' => ['required', 'integer'],
			'employee_performance_assessment_id' => ['required'],
			'superior_id' => ['required'],
        ];
    }
}
