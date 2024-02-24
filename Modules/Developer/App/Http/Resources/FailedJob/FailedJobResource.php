<?php

namespace App\Http\Resources\FailedJob;

use Illuminate\Http\Resources\Json\JsonResource;

class FailedJobResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'connection' => $this->connection,
            'queue' => $this->queue,
            'payload' => json_decode($this->payload),
            'exception' => $this->exception,
            'failed_at' => $this->failed_at->isoFormat('LLLL'),
        ];
    }
}
