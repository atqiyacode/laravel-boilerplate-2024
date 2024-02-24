<?php

namespace Modules\MobileApp\App\Http\Requests\MobileAppMenu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMobileAppMenuRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:mobile_app_menus,code,' . $this->id],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'max:1000'],
            'icon' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ];
    }
}
