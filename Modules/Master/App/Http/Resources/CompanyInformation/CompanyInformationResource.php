<?php

namespace App\Http\Resources\CompanyInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyInformationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return $this->id;
            }),
            'name' => $this->name,
            'logo' => $this->logo,
            'about_us' => $this->about_us,
            'main_email' => $this->main_email,
            'secondary_email' => $this->secondary_email,
            'main_phone' => $this->main_phone,
            'secondary_phone' => $this->secondary_phone,
            'call_center' => $this->call_center,
            'website_aduan' => $this->website_aduan,
            'whatsapp_number' => $this->whatsapp_number,
            'location' => $this->location,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,

        ];
    }
}
