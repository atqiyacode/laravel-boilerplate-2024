<?php

namespace Modules\User\App\Http\Requests\User;

use Modules\User\App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'avatar' => 'nullable|string|max:150',

            'roles' => 'required|array|exists:roles,id',
            'permissions' => 'sometimes|array|exists:permissions,id',
        ];
    }
}
