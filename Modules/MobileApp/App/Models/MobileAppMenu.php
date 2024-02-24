<?php

namespace Modules\MobileApp\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\MobileApp\App\Filters\MobileAppMenuFilters;
use Modules\MobileApp\App\Scopes\CanDeleteScope;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileAppMenu extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope;

    protected string $default_filters = MobileAppMenuFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'icon',
        'status',
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
