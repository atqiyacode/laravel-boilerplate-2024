<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantEmergencyContact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantEmergencyContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+62|62|0)[2-9][0-9]*$/', 'max:18'],
            'address' => ['nullable', 'string', 'max:255'],
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'applicant_resume_id' => trans('applicant_resume'),
        ];
    }
}
