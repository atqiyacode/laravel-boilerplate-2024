<?php

namespace Modules\Master\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Master\Filters\LevelOfEducationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\App\Scopes\CanDeleteScope;
use Modules\Master\App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LevelOfEducation extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = LevelOfEducationFilters::class;

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

    // public function employeeEducation(): HasOne
    // {
    //     return $this->hasOne(EmployeeEducation::class);
    // }

    // public function employeeExperience(): HasOne
    // {
    //     return $this->hasOne(EmployeeExperience::class);
    // }

    // public function applicantEducation(): HasOne
    // {
    //     return $this->hasOne(ApplicantEducation::class);
    // }

    // public function applicantExperience(): HasOne
    // {
    //     return $this->hasOne(ApplicantExperience::class);
    // }

    /**
     * Get all of the employees for the LevelOfEducation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(EmployeeEducation::class);
    }
    /**
     * Get all of the applicants for the LevelOfEducation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicants(): HasMany
    {
        return $this->hasMany(ApplicantEducation::class);
    }
}
