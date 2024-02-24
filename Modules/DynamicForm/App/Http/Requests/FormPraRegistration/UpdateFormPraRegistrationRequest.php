<?php

namespace Modules\DynamicForm\App\Http\Requests\FormPraRegistration;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormPraRegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'applicant_resume_id' => ['required', 'exists:applicant_resumes,id'],
            'project_id' => ['required', 'exists:projects,id'],
            'form_question_pra_registration_id' => ['required', 'exists:form_question_pra_registrations,id'],
            'batch' => ['required', 'integer'],
            'wilayah_tugas' => ['required', 'string', 'max:255'],
            'ingin_malanjutkan_pekerjaan' => ['required', 'boolean'],
            'ingin_posisi_yang_sama' => ['required', 'boolean'],
            'komitmen' => ['required', 'boolean'],
            'ketentuan' => ['required', 'boolean'],
            'kendala' => ['required', 'string', 'max:255'],
            'kesan_pesan' => ['required', 'string', 'max:255'],
            'kritik_saran' => ['required', 'string', 'max:255'],
        ];
    }
}
