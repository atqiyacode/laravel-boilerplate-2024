<?php

namespace Modules\DynamicForm\App\Http\Requests\FormQuestionPraRegistration;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormQuestionPraRegistrationRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'project_id' => ['required', 'exists:projects,id'],
			'batch' => ['required'],
			'wilayah_tugas' => ['required'],
			'ingin_malanjutkan_pekerjaan' => ['required'],
			'ingin_posisi_yang_sama' => ['required'],
			'komitmen' => ['required'],
			'ketentuan' => ['required'],
			'kendala' => ['required'],
			'kesan_pesan' => ['required'],
			'kritik_saran' => ['required'],
			'other_fields' => ['required', 'json'],
		];
	}
}
