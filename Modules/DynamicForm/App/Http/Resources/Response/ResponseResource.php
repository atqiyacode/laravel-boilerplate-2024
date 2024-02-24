<?php

namespace Modules\DynamicForm\App\Http\Resources\Response;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseResource extends JsonResource
{
    public function toArray($request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'form_id' => $this->form_id,
            'applicant_resume_id' => $this->applicant_resume_id,

            'form' => $this->form,
            'applicantResume' => $this->applicantResume,

            'responseData' => $this->when(request()->route()->getName() !== 'responses.index', function () {
                return $this->responseData;
            }),

            'response_data_count' => $this->response_data_count,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
