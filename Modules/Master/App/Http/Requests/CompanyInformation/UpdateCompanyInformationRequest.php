<?php

namespace App\Http\Requests\CompanyInformation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyInformationRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:255'],
			'logo' => ['required', 'string', 'max:255'],
			'about_us' => ['required'],
			'main_email' => ['required', 'email', 'string', 'max:255'],
			'secondary_email' => ['required', 'email', 'string', 'max:255'],
			'main_phone' => ['required', 'string', 'max:255'],
			'secondary_phone' => ['required', 'string', 'max:255'],
			'call_center' => ['required', 'string', 'max:255'],
			'website_aduan' => ['required', 'string', 'max:255'],
			'whatsapp_number' => ['required', 'string', 'max:255'],
			'location' => ['required', 'string', 'max:255'],
			'longitude' => ['required', 'string', 'max:255'],
			'latitude' => ['required', 'string', 'max:255'],
		];
	}
}
