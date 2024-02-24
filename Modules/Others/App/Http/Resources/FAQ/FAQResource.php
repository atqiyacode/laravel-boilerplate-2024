<?php

namespace Modules\Others\App\Http\Resources\FAQ;

use Illuminate\Http\Resources\Json\JsonResource;

class FAQResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return $this->id;
            }),

            'question' => $this->question,
            'answer' => $this->answer,
            'status' => (bool) $this->status,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
