<?php

namespace App\Http\Resources\UserLogActivity;

use App\Http\Resources\User\SimpleUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryUserLogActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => new SimpleUserResource($this->whenLoaded('user')),
            'log_type' => $this->log_type,
            'table_name' => $this->table_name,
            'data' => $this->json_data,
            'log_date_human' => $this->dateHumanize,
            'log_date' => ($this->log_date),
        ];
    }
}
