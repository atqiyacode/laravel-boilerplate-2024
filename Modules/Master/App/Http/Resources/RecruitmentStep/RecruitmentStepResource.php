<?php

namespace Modules\Master\App\Http\Resources\RecruitmentStep;

use Illuminate\Http\Resources\Json\JsonResource;

class RecruitmentStepResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return $this->id;
            }),
            'label' => $this->label,
            'description' => $this->description,
            'icon' => $this->icon,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
