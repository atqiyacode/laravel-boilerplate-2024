<?php

namespace Modules\User\App\Http\Resources\UserVerificationCode;

use Modules\User\App\Http\Resources\User\SimpleUserResource;
use Modules\User\App\Http\Resources\VerificationCodeType\VerificationCodeTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserVerificationCodeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'verification_code_type_id' => $this->verification_code_type_id,

            'user' => new SimpleUserResource($this->user),
            'verification_code_type' => new VerificationCodeTypeResource($this->verificationCodeType),

            'token_code' => $this->token_code,
            'is_expired' => $this->expired_at->gt(now()),
            'expired_at' => ($this->expired_at),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),
        ];
    }
}
