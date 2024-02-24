<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantResume;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleApplicantResumeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'nama_lengkap' => $this->nama_lengkap,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => ($this->tanggal_lahir),
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat_domisili' => $this->alamat_domisili,
            'alamat_ktp' => $this->alamat_ktp,
            'tentang_diri' => $this->tentang_diri,
            'other_fields' => $this->other_fields,
            'foto_ktp' => $this->foto_ktp,
            'foto_npwp' => $this->foto_npwp,
            'foto_pasfoto' => $this->foto_pasfoto,
            'foto_selfie' => $this->foto_selfie,
            'foto_kswp' => $this->foto_kswp,
            'foto_cv' => $this->foto_cv,

            'age' => (int) $this->age,

            'religion_id' => $this->religion_id,
            'user_id' => $this->user_id,
            'gender_id' => $this->gender_id,

            'user' => $this->user,
            'religion' => $this->religion,
            'gender' => $this->gender,

            // count
            'applicant_education_count' => $this->applicant_education_count,
            'applicant_experiences_count' => $this->applicant_experiences_count,
            'applicant_language_skills_count' => $this->applicant_language_skills_count,
            'applicant_organization_experiences_count' => $this->applicant_organization_experiences_count,
            'applicant_certificate_of_expertises_count' => $this->applicant_certificate_of_expertises_count,
            'applicant_achievements_count' => $this->applicant_achievements_count,
            'applicant_relation_references_count' => $this->applicant_relation_references_count,
            'applicant_media_socials_count' => $this->applicant_media_socials_count,
            'job_application_count' => $this->job_application_count,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

        ];
    }
}
