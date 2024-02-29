<?php

namespace Modules\Master\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Master\App\Filters\CompanyInformationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CompanyInformation extends Model
{
    use HasFactory, Loggable, Filterable;

    protected string $default_filters = CompanyInformationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'logo',
        'about_us',
        'main_email',
        'secondary_email',
        'main_phone',
        'secondary_phone',
        'call_center',
        'website_aduan',
        'whatsapp_number',
        'location',
        'longitude',
        'latitude',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
