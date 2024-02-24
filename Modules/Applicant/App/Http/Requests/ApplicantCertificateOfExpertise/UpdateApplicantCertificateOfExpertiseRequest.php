<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantCertificateOfExpertise;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicantCertificateOfExpertiseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'nama_kegiatan' => [
                'required', 'string', 'max:255',
                Rule::unique('applicant_certificate_of_expertises')->where(function ($query) {
                    return $query->where('applicant_resume_id', $this->applicant_resume_id)
                        ->where('nama_kegiatan', $this->nama_kegiatan);
                })->ignore($this->id)
            ],
            'tahun' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'foto_sertifikat' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kegiatan.unique' => 'nama_kegiatan certificate pada resume tersebut sudah ada.'
        ];
    }

    public function attributes(): array
    {
        return [
            'applicant_resume_id' => trans('applicant_resume'),
            'nama_kegiatan' => trans('nama_kegiatan')
        ];
    }
}
