<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantAttachment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantAttachmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id', 'unique:applicant_attachments,applicant_resume_id,' . $this->id],
            'foto_ktp' => ['nullable', 'string', 'max:255'],
            'foto_npwp' => ['nullable', 'string', 'max:255'],
            'foto_pasfoto' => ['nullable', 'string', 'max:255'],
            'foto_selfie' => ['nullable', 'string', 'max:255'],
            'foto_kswp' => ['nullable', 'string', 'max:255'],
            'foto_cv' => ['nullable', 'string', 'max:255'],
        ];
    }
}
