<?php

namespace Modules\Auth\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateTokenCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:5',
            'method' => 'required|in:email,whatsapp,device',
        ];
    }

    public function messages()
    {
        return [
            // 'username.exists' => trans('validation.exists', ['attribute' => trans('client.employee_code')]),
            // 'username.alpha_num' => trans('validation.alpha_num', ['attribute' => trans('client.employee_code')]),
        ];
    }
}
