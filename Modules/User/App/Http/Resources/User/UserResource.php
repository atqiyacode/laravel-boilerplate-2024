<?php

namespace Modules\User\App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'avatar' => config('app.url') . '/storage/users-avatar/' . $this->avatar_image,
            'api_key' => $this->api_key,
            'active_status' => $this->active_status,
            'dark_mode' => $this->dark_mode,
            'messenger_color' => $this->messenger_color,
            'is_verified' => (bool) $this->email_verified_at,
            'roles' => $this->roles->pluck('name'),
            'permissions' => $this->permissions->pluck('name'),

            'is_employee' => (bool) $this->employee,
            'is_applicant' => (bool) $this->applicantResume,

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
