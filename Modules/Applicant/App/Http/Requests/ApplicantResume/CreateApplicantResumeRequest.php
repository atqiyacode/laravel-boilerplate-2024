<?php

namespace Modules\Applicant\App\Http\Requests\ApplicantResume;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicantResumeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nik' => ['required', 'string', 'max:255', 'unique:applicant_resumes,nik'],

            'nama_lengkap' => ['required', 'string', 'max:255'],

            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:' . now()->subYears(17)->format('Y-m-d')],

            'alamat_domisili' => ['required', 'string', 'max:500'],
            'alamat_ktp' => ['required', 'string', 'max:500'],

            'tentang_diri' => ['nullable', 'string', 'max:1000'],
            'other_fields' => ['nullable', 'json'],

            'foto_ktp' => ['nullable', 'string', 'max:255'],
            'foto_npwp' => ['nullable', 'string', 'max:255'],
            'foto_pasfoto' => ['nullable', 'string', 'max:255'],
            'foto_selfie' => ['nullable', 'string', 'max:255'],
            'foto_kswp' => ['nullable', 'string', 'max:255'],
            'foto_cv' => ['nullable', 'string', 'max:255'],

            'gender_id' => ['required', 'exists:genders,id'],
            'religion_id' => ['required', 'exists:religions,id'],

            'user_id' => ['required', 'exists:users,id', 'unique:applicant_resumes,user_id'],
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal_lahir.before' => trans('alert.minimum-age'),
        ];
    }

    public function attributes(): array
    {
        return [
            'gender_id' => trans('gender'),
            'user_id' => trans('user'),
            'religion_id' => trans('religion'),
        ];
    }
}
