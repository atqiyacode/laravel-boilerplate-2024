<?php

namespace Modules\Master\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Master\App\Filters\EmployeeTypeFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Employee\App\Models\Employee;

class EmployeeType extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope;

    protected string $default_filters = EmployeeTypeFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
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

    /**
     * Get all of the employees for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(\Modules\Employee\App\Models\Employee::class);
    }
}
