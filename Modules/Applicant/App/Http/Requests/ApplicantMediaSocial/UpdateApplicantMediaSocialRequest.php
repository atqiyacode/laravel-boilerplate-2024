<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantMediaSocial;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicantMediaSocialRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'nama_media' => [
                'required', 'string', 'max:255',
                Rule::unique('applicant_media_socials')->where(function ($query) {
                    return $query->where('applicant_resume_id', $this->applicant_resume_id)
                        ->where('nama_media', $this->nama_media);
                })->ignore($this->id)
            ],
            'link' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_media.unique' => 'nama_media sudah ada untuk resume tersebut.'
        ];
    }

    public function attributes(): array
    {
        return [
            'employee_id' => trans('employee'),
            'nama_media' => trans('nama_media')
        ];
    }
}
