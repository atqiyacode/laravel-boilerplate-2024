<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantRelationReference;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicantRelationReferenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'nama' => ['nullable', 'string', 'max:255'],
            'jabatan' => ['nullable', 'string', 'max:255'],
            'no_telf' => ['nullable', 'string', 'max:255'],
            'hubungan' => ['nullable', 'string', 'max:255'],
        ];
    }
}
