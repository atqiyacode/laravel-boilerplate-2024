<?php

namespace Modules\DynamicForm\App\Http\Resources\Form;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleFormResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'project_id' => $this->project_id,
            'title' => $this->title,
            'description' => $this->description,

            'project' => $this->project,

            'form_fields_count' => $this->form_fields_count,
            'responses_count' => $this->responses_count,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
