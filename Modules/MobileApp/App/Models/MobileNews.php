<?php

namespace Modules\MobileApp\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\MobileApp\App\Filters\MobileNewsFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MobileApp\App\Scopes\CanDeleteScope;
use Modules\MobileApp\App\Scopes\DeveloperScope;

class MobileNews extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = MobileNewsFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'cover',
        'title',
        'content',
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
