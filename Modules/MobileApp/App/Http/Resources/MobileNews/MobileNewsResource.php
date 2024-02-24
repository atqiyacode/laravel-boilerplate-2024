<?php

namespace Modules\MobileApp\App\Http\Resources\MobileNews;

use Illuminate\Http\Resources\Json\JsonResource;

class MobileNewsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'cover' => $this->cover,
            'title' => $this->title,
            'content' => $this->content,
            'status' => (bool) $this->status,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
