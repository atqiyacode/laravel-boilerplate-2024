<?php

namespace Modules\User\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\User\App\Filters\UserFirebaseTokenFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserFirebaseToken extends Model
{
    use HasFactory, Loggable, Filterable;

    protected string $default_filters = UserFirebaseTokenFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'device_token',
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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
