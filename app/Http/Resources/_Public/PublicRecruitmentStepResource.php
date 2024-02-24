<?php

namespace App\Http\Resources\_public;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicRecruitmentStepResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'label' => $this->label,
            'description' => $this->description,
            'icon' => $this->icon,
        ];
    }
}
