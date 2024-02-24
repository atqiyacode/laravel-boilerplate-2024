<?php

namespace Modules\MobileApp\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\MobileApp\App\Filters\MobileVersionFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MobileApp\App\Scopes\CanDeleteScope;
use Modules\MobileApp\App\Scopes\DeveloperScope;

class MobileVersion extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = MobileVersionFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'version',
        'version_code',
        'note',
        'device',
        'status',
        'package_file',
        'download_link',
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
