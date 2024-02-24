<?php

namespace Modules\JobApplication\App\Http\Requests\JobApplicationStatus;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobApplicationStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'max:255', 'unique:job_application_statuses,code'],
            'name' => ['required', 'string', 'max:255', 'unique:job_application_statuses,name'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
