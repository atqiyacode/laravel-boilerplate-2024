<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantRelationReference;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantRelationReferenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'no_telf' => ['required', 'string', 'max:255'],
            'hubungan' => ['required', 'string', 'max:255'],
        ];
    }
}
