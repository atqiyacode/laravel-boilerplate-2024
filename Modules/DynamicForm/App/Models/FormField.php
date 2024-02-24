<?php

namespace Modules\DynamicForm\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\DynamicForm\App\Filters\FormFieldFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\DynamicForm\App\Scopes\CanDeleteScope;
use Modules\DynamicForm\App\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormField extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = FormFieldFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
        'type',
        'label',
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

    public function form(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Form::class)->select([
            'id',
            'project_id',
            'title',
            'description',
        ])->with([
            'project:id,name'
        ]);
    }

    public function responseDatas(): HasMany
    {
        return $this->hasMany(ResponseData::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
