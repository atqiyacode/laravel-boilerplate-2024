<?php

namespace Modules\MobileApp\App\Http\Requests\MobileVersion;

use Illuminate\Foundation\Http\FormRequest;

class CreateMobileVersionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'version' => ['required', 'string', 'max:255'],
            'version_code' => ['required', 'string', 'max:255'],
            'note' => ['nullable'],
            'device' => ['required', 'in:iphone,android'],
            'status' => ['required', 'boolean'],
            'package_file' => ['nullable', 'string', 'max:255'],
            'download_link' => ['nullable', 'string', 'max:255'],
        ];
    }
}
