<?php

namespace Modules\Developer\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Developer\App\Filters\FailedJobFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FailedJob extends Model
{
    use HasFactory, Loggable, Filterable;

    protected string $default_filters = FailedJobFilters::class;

    public $timestamps = false;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at',
    ];

    protected $casts = [
        'failed_at' => 'datetime',
    ];
}
