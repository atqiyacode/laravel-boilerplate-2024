<?php

namespace Modules\JobVacancy\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\JobVacancy\App\Filters\JobVacancyFilters;
use Cviebrock\EloquentSluggable\Sluggable;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\JobVacancy\App\Scopes\CanDeleteScope;
use Modules\JobVacancy\App\Scopes\DeveloperScope;

class JobVacancy extends Model
{
    use HasFactory, Loggable, Filterable, Sluggable, SoftDeletes, CanDeleteScope;

    protected string $default_filters = JobVacancyFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
        'general_qualifications',
        'job_description',
        'type',
        'status',
        'open_date',
        'close_date',
        'project_id',
        'position_id',
    ];


    protected $casts = [
        'open_date' => 'datetime',
        'close_date' => 'datetime',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
