<?php

namespace Modules\User\App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CurrentUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $pendingEmail = $this->getPendingEmail();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'is_verified' => (bool) $this->email_verified_at,
            // 'phone' => Str::replaceFirst('62', '0', $this->phone),
            'avatar' => config('app.url') . '/storage/users-avatar/' . $this->avatar_image,
            'roles' => $this->roles->pluck('name'),
            // 'permissions' => $this->permissions->pluck('name'),
            'newEmail' => (bool) $pendingEmail,
            'pendingEmail' => $pendingEmail,
            'say_hello' => $this->greeting . $this->name,
            'notifications' => $this->notifications->where('status', false)->count(),
        ];
    }
}
