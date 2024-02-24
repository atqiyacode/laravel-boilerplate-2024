<?php

namespace Modules\DynamicForm\App\Http\Resources\FormQuestionPraRegistration;

use Illuminate\Http\Resources\Json\JsonResource;

class FormQuestionPraRegistrationResource extends JsonResource
{
	public function toArray($request): array
	{
		return [
			'id' => $this->id,
			'project_id' => $this->project_id,
			'batch' => $this->batch,
			'wilayah_tugas' => $this->wilayah_tugas,
			'ingin_malanjutkan_pekerjaan' => $this->ingin_malanjutkan_pekerjaan,
			'ingin_posisi_yang_sama' => $this->ingin_posisi_yang_sama,
			'komitmen' => $this->komitmen,
			'ketentuan' => $this->ketentuan,
			'kendala' => $this->kendala,
			'kesan_pesan' => $this->kesan_pesan,
			'kritik_saran' => $this->kritik_saran,
			'other_fields' => $this->other_fields,

		];
	}
}
