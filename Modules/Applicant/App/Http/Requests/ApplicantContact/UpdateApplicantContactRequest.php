<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantContact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id', 'unique:applicant_contacts,applicant_resume_id,' . $this->id],
            'phone' => ['required', 'regex:/^(\+62|62|0)[2-9][0-9]*$/', 'max:18', 'unique:applicant_contacts,phone,' . $this->id],
            'whatsapp' => ['nullable', 'regex:/^(\+62|62|0)[2-9][0-9]*$/', 'max:18', 'unique:applicant_contacts,whatsapp,' . $this->id],
            'email' => ['nullable', 'email', 'string', 'max:255', 'unique:applicant_contacts,email,' . $this->id],
        ];
    }

    public function attributes(): array
    {
        return [
            'applicant_resume_id' => trans('applicant_resume'),
        ];
    }
}
