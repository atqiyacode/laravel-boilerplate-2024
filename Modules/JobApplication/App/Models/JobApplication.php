<?php

namespace Modules\JobApplication\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\JobApplication\App\Filters\JobApplicationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = JobApplicationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'job_vacancy_id',
        'applicant_resume_id',
        'status',
        'keterangan',
        'referal',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select([
            'id',
            'name',
            'username',
            'email',
        ]);
    }

    public function jobVacancy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(JobVacancy::class)->where('status', 1)
            ->select('id', 'title', 'position_id', 'open_date', 'close_date', 'status')
            ->with(['position:id,name']);
    }

    public function applicantResume(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ApplicantResume::class)->with([
            'applicantEducation' => function ($query3) {
                $query3->with(['levelOfEducation:id,name']);
            }, 'applicantExperiences' => function ($query4) {
                $query4->with(['levelOfEducation:id,name']);
            },
            'applicantLanguageSkills',
            'applicantOrganizationExperiences',
            'applicantCertificateOfExpertises',
            'applicantAchievements',
            'applicantRelationReferences',
            'applicantMediaSocials'
        ]);
    }
}
