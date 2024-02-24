<?php

namespace Modules\User\App\Http\Resources\UserFirebaseToken;

use Modules\User\App\Http\Resources\User\SimpleUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserFirebaseTokenResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'device_token' => $this->device_token,

            'user' => new SimpleUserResource($this->user),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
