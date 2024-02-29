<?php

namespace Modules\Applicant\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Applicant\App\Filters\ApplicantResumeFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicantResume extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ApplicantResumeFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_domisili',
        'alamat_ktp',
        'tentang_diri',
        'other_fields',
        'foto_ktp',
        'foto_npwp',
        'foto_pasfoto',
        'foto_selfie',
        'foto_kswp',
        'foto_cv',
        'user_id',
        'religion_id',
        'gender_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // protected $appends = ['age'];

    public function getAgeAttribute(): string
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    public function applicantEducation(): HasMany
    {
        return $this->hasMany(ApplicantEducation::class)->with(['levelOfEducation:id,name']);
    }

    public function applicantExperiences(): HasMany
    {
        return $this->hasMany(ApplicantExperience::class)->with(['levelOfEducation:id,name']);
    }

    public function applicantLanguageSkills(): HasMany
    {
        return $this->hasMany(ApplicantLanguageSkill::class);
    }

    public function applicantOrganizationExperiences(): HasMany
    {
        return $this->hasMany(ApplicantOrganizationExperience::class);
    }

    public function applicantCertificateOfExpertises(): HasMany
    {
        return $this->hasMany(ApplicantCertificateOfExpertise::class);
    }

    public function applicantAchievements(): HasMany
    {
        return $this->hasMany(ApplicantAchievement::class);
    }

    public function applicantRelationReferences(): HasMany
    {
        return $this->hasMany(ApplicantRelationReference::class);
    }

    public function applicantMediaSocials(): HasMany
    {
        return $this->hasMany(ApplicantMediaSocial::class);
    }

    public function jobApplication(): HasMany
    {
        return $this->hasMany(\Modules\JobApplication\App\Models\JobApplication::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\Modules\User\App\Models\User::class)->select([
            'id',
            'name',
            'username',
            'email',
            'avatar',
        ]);
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(\Modules\Master\App\Models\Religion::class)->select([
            'id',
            'name',
        ]);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(\Modules\Master\App\Models\Gender::class)->select([
            'id',
            'name',
        ]);
    }

    public function formPraRegistration(): BelongsTo
    {
        return $this->belongsTo(\Modules\DynamicForm\App\Models\FormPraRegistration::class);
    }

    public function response(): HasMany
    {
        return $this->hasMany(\Modules\DynamicForm\App\Models\Response::class);
    }
}
