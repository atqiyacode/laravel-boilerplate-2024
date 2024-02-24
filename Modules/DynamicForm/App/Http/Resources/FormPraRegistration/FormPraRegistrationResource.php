<?php

namespace Modules\DynamicForm\App\Http\Resources\FormPraRegistration;

use Illuminate\Http\Resources\Json\JsonResource;

class FormPraRegistrationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'applicant_resume_id' => $this->applicant_resume_id,
            'project_id' => $this->project_id,
            'form_question_pra_registration_id' => $this->form_question_pra_registration_id,
            'batch' => $this->batch,
            'wilayah_tugas' => $this->wilayah_tugas,
            'ingin_malanjutkan_pekerjaan' => $this->ingin_malanjutkan_pekerjaan,
            'ingin_posisi_yang_sama' => $this->ingin_posisi_yang_sama,
            'komitmen' => $this->komitmen,
            'ketentuan' => $this->ketentuan,
            'kendala' => $this->kendala,
            'kesan_pesan' => $this->kesan_pesan,
            'kritik_saran' => $this->kritik_saran,

            'applicantResume' => $this->applicantResume,
            'project' => $this->project,
            'formQuestionPraRegistration' => $this->formQuestionPraRegistration,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
