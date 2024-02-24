<?php

namespace Modules\Applicant\App\Models;

use Modules\Applicant\App\Filters\ApplicantEmergencyContactFilters;
use Modules\Applicant\App\Scopes\CanDeleteScope;
use Modules\Applicant\App\Scopes\DeveloperScope;
use Essa\APIToolKit\Filters\Filterable;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantEmergencyContact extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ApplicantEmergencyContactFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'applicant_resume_id',
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

    public function applicantResume(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Applicant\App\Models\ApplicantResume::class)->select(['id', 'nik', 'nama_lengkap']);
    }
}
