<?php

namespace Modules\MobileApp\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\MobileApp\App\Filters\MobileServerFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MobileServer extends Model
{
    use HasFactory, Loggable, Filterable;

    protected string $default_filters = MobileServerFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
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
