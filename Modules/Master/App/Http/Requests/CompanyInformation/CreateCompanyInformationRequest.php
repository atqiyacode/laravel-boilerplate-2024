<?php

namespace Modules\Master\App\Http\Requests\CompanyInformation;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyInformationRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:255'],
			'logo' => ['nullable', 'string', 'max:255'],
			'about_us' => ['nullable'],
			'main_email' => ['nullable', 'email', 'string', 'max:255'],
			'secondary_email' => ['nullable', 'email', 'string', 'max:255'],
			'main_phone' => ['nullable', 'string', 'max:255'],
			'secondary_phone' => ['nullable', 'string', 'max:255'],
			'call_center' => ['nullable', 'string', 'max:255'],
			'website_aduan' => ['nullable', 'string', 'max:255'],
			'whatsapp_number' => ['nullable', 'string', 'max:255'],
			'location' => ['nullable', 'string', 'max:255'],
			'longitude' => ['nullable', 'string', 'max:255'],
			'latitude' => ['nullable', 'string', 'max:255'],
		];
	}
}
