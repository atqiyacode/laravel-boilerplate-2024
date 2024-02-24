<?php

namespace Modules\DynamicForm\App\Http\Resources\Option;

use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'form_field_id' => $this->form_field_id,
            'value' => $this->value,

            'formField' => $this->formField,
            'responseData' => $this->responseData,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
