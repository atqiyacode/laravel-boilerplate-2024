<?php

namespace Modules\MobileApp\App\Http\Resources\MobileVersion;

use Illuminate\Http\Resources\Json\JsonResource;

class MobileVersionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'version' => $this->version,
            'version_code' => $this->version_code,
            'note' => $this->note,
            'device' => $this->device,
            'status' => (bool) $this->status,
            'package_file' => $this->package_file,
            'download_link' => $this->download_link,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
