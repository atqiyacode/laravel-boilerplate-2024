<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantOrganizationExperience;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateApplicantOrganizationExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'nama_organisasi' => [
                'nullable', 'string', 'max:255',
                Rule::unique('applicant_organization_experiences')->where(function ($query) {
                    return $query->where('applicant_resume_id', $this->applicant_resume_id)
                        ->where('nama_organisasi', $this->nama_organisasi);
                })
            ],
            'posisi' => ['nullable', 'string', 'max:255'],
            'jenis_organisasi' => ['nullable', 'string', 'max:255'],
            'tahun_mulai' => ['nullable', 'string', 'max:255'],
            'tahun_selesai' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_organisasi.unique' => 'nama_organisasi sudah ada untuk resume tersebut.'
        ];
    }

    public function attributes(): array
    {
        return [
            'employee_id' => trans('employee'),
            'nama_organisasi' => trans('nama_organisasi')
        ];
    }
}
