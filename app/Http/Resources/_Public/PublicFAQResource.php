<?php

namespace App\Http\Resources\_public;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicFAQResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'question' => $this->question,
            'answer' => $this->answer,
        ];
    }
}
