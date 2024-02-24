<?php

namespace Modules\MobileApp\App\Http\Resources\MobileServer;

use Illuminate\Http\Resources\Json\JsonResource;

class MobileServerResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'status' => $this->status,
        ];
    }
}
