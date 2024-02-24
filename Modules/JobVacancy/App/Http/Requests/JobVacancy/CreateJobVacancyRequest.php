<?php

namespace Modules\JobVacancy\App\Http\Requests\JobVacancy;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobVacancyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'general_qualifications' => ['nullable'],
            'job_description' => ['nullable'],
            'type' => ['required', 'in:open,close'],
            'status' => ['required', 'boolean'],

            'open_date' => ['required', 'date', 'after_or_equal:today'],
            'close_date' => ['required', 'date', 'after_or_equal:open_date'],

            'project_id' => ['nullable', 'exists:projects,id'],
            'position_id' => ['required', 'exists:positions,id'],
        ];
    }
}
