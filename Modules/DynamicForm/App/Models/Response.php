<?php

namespace Modules\DynamicForm\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\DynamicForm\App\Filters\ResponseFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\DynamicForm\App\Scopes\CanDeleteScope;
use Modules\DynamicForm\App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = ResponseFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
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

    public function applicantResume(): BelongsTo
    {
        return $this->belongsTo(ApplicantResume::class)->select([
            'id',
            'nik',
            'nama_lengkap'
        ]);
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class)->select([
            'id',
            'project_id',
            'title',
            'description',
        ])->with([
            'project:id,name'
        ]);
    }

    public function responseData(): HasMany
    {
        return $this->hasMany(ResponseData::class);
    }
}
