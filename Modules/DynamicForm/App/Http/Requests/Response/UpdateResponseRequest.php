<?php

namespace Modules\DynamicForm\App\Http\Requests\Response;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResponseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'form_id' => ['required', 'exists:forms,id'],
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
        ];
    }
}
