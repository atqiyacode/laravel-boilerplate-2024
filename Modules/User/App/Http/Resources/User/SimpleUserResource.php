<?php

namespace Modules\User\App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleUserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'avatar' => config('app.url') . '/storage/users-avatar/' . $this->avatar_image,
        ];
    }
}
