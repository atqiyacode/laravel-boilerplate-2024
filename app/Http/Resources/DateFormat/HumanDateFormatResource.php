<?php

namespace App\Http\Resources\DateFormat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HumanDateFormatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => $this->isoFormat('dddd, LL'),
            'full_date' => $this->isoFormat('LLLL'),
            'human_date' => $this->diffForHumans(),
        ];
    }
}
