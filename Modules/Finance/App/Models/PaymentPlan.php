<?php

namespace Modules\Finance\App\Models;

use Modules\Finance\App\Filters\PaymentPlanFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentPlan extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = PaymentPlanFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'period',
        'name_of_kak',
        'number_of_members',
        'time_period',
        'work_start_date',
        'end_work_date',
        'unit_id',
        'schema',
        'petition',
        'disposition',
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
        'work_start_date' => 'date',
        'end_work_date' => 'date',
        'petition' => 'date',
        'disposition' => 'date',
    ];

    public function unit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Unit::class);
    }
}
