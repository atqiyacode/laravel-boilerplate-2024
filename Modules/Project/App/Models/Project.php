<?php

namespace Modules\Project\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Project\App\Filters\ProjectFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ProjectFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'max_apply',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get all of the jobVacancies for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobVacancies(): HasMany
    {
        return $this->hasMany(\Modules\JobVacancy\App\Models\JobVacancy::class)->with([
            'jobApplications',
            'position',
        ]);
    }

    public function totalAppliedJob()
    {
        $totalAppliedJob = \Modules\JobApplication\App\Models\JobApplication::whereIn('job_vacancy_id', function ($query) {
            $query->select('id')
                ->from('job_vacancies')
                ->where('project_id', $this->id);
        })->where('user_id', auth()->user()->id)->count();

        return $totalAppliedJob;
    }

    public function formQuestionPraRegistrations()
    {
        return $this->hasOne(\Modules\DynamicForm\App\Models\FormQuestionPraRegistration::class);
    }

    public function formPraRegistrations()
    {
        return $this->hasMany(\Modules\DynamicForm\App\Models\FormPraRegistration::class);
    }

    public function form()
    {
        return $this->hasOne(\Modules\DynamicForm\App\Models\Form::class);
    }
}
