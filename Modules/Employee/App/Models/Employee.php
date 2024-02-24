<?php

namespace Modules\Employee\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Employee\App\Filters\EmployeeFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class Employee extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = EmployeeFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nik',
        'full_name',
        'tempat_lahir',
        'tanggal_lahir',
        'gender_id',
        'religion_id',
        'field_of_work_id',
        'working_area_id',
        'employee_type_id',
        'position_id',
        'unit_id',
        'main_class_id',
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

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function getAgeAttribute()
    {
        return $this->tanggal_lahir->age;
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('nik', auth()->user()->username);
    }

    public function scopeNotCurrentUser($query)
    {
        return $query->where('nik', '!=', auth()->user()->username);
    }

    // relationship - belongs to
    public function mainClass(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\MainClass::class);
    }

    public function unit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Unit::class);
    }

    public function position(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Position::class);
    }

    public function employeeType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\EmployeeType::class);
    }

    public function gender(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Gender::class);
    }

    public function religion(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Religion::class);
    }

    public function fieldOfWork(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\FieldOfWork::class);
    }

    public function workingArea(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\WorkingArea::class);
    }

    // relationship - has one
    public function employeeDetail(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\EmployeeDetail::class);
    }

    public function employeeContact(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\EmployeeContact::class);
    }

    public function employeePermitRemaining(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\EmployeePermitRemaining::class);
    }

    // relationship - has many
    public function employeeContracts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeContract::class, 'employee_id', 'id')->canDelete();
    }

    public function employeeEmergencyContacts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeEmergencyContact::class)->canDelete();
    }

    public function employeeExperiences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeExperience::class)->canDelete()->with(['levelOfEducation']);
    }

    public function employeeAttachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeAttachment::class)->canDelete();
    }

    public function employeeLanguageSkills(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeLanguageSkill::class)->canDelete();
    }
    public function employeeEducation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeEducation::class)->canDelete()->with(['levelOfEducation']);
    }
    public function employeeAchievements(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeAchievement::class)->canDelete();
    }
    public function employeeCertificateOfExpertises(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeCertificateOfExpertise::class)->canDelete();
    }
    public function employeeMediaSocial(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeMediaSocial::class)->canDelete();
    }
    public function employeeOrganizationExperiences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeOrganizationExperience::class)->canDelete();
    }
    public function employeeRelationReferences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeRelationReference::class)->canDelete();
    }
}
