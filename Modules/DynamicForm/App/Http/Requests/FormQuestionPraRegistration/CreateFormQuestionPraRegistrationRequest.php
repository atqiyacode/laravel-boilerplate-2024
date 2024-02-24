<?php

namespace Modules\DynamicForm\App\Http\Requests\FormQuestionPraRegistration;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormQuestionPraRegistrationRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'project_id' => ['required', 'exists:projects,id'],
			'batch' => ['nullable'],
			'wilayah_tugas' => ['nullable'],
			'ingin_malanjutkan_pekerjaan' => ['nullable'],
			'ingin_posisi_yang_sama' => ['nullable'],
			'komitmen' => ['nullable'],
			'ketentuan' => ['nullable'],
			'kendala' => ['nullable'],
			'kesan_pesan' => ['nullable'],
			'kritik_saran' => ['nullable'],
			'other_fields' => ['nullable', 'json'],
		];
	}
}
