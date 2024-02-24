<?php

namespace Modules\Applicant\App\Http\Resources\ApplicantResume;

use Modules\Applicant\App\Http\Resources\Gender\PublicGenderResource;
use Modules\Applicant\App\Http\Resources\Religion\PublicReligionResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicApplicantResumeResource extends JsonResource
{
    public function toArray($request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'nama_lengkap' => $this->nama_lengkap,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tanggal_lahir_format' => Carbon::parse($this->tanggal_lahir)->isoFormat('LL'),
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

            'religion' => new PublicReligionResource($this->religion),
            'gender' => new PublicGenderResource($this->gender),

            'educations' => $this->applicantEducation,
            'experiences' => $this->applicantExperiences,

        ];
    }
}
