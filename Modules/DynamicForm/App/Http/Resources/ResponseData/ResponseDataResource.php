<?php

namespace Modules\DynamicForm\App\Http\Resources\ResponseData;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseDataResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'response_id' => $this->response_id,
            'form_field_id' => $this->form_field_id,
            'option_id' => $this->option_id,
            'value' => $this->value,

            'response' => $this->response,
            'formField' => $this->formField,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
