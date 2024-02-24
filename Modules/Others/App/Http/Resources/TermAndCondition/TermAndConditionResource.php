<?php

namespace Modules\Others\App\Http\Resources\TermAndCondition;

use Illuminate\Http\Resources\Json\JsonResource;

class TermAndConditionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return $this->id;
            }),

            'content' => $this->content,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
