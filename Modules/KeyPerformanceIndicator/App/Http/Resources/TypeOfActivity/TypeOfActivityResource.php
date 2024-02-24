<?php

namespace Modules\KeyPerformanceIndicator\App\Http\Resources\TypeOfActivity;

use Modules\KeyPerformanceIndicator\Http\Resources\FieldOfWork\FieldOfWorkResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeOfActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'note' => $this->note,
            'field_of_work_id' => $this->field_of_work_id,

            'fieldOfWork' => new FieldOfWorkResource($this->fieldOfWork),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
