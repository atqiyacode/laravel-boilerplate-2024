<?php

namespace Modules\Master\App\Http\Resources\Religion;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicReligionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
