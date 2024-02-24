<?php

namespace App\Http\Resources\Gender;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicGenderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => trans('lang.' . $this->name),
        ];
    }
}
