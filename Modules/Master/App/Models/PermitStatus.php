<?php

namespace Modules\Master\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Master\Filters\PermitStatusFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Cviebrock\EloquentSluggable\Sluggable;

class PermitStatus extends Model
{
    use HasFactory, Loggable, Sluggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = PermitStatusFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'description',
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
