<?php

namespace Modules\Notification\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Notification\App\Filters\TemplateNotificationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;

class TemplateNotification extends Model
{
    use HasFactory, Loggable, Filterable, SoftDeletes, CanDeleteScope, DeveloperScope;

    protected string $default_filters = TemplateNotificationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'message',
        'image',
        'attachment',
        'notification_type_id',
        'user_id',
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

    public function notificationType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Notification\App\Models\NotificationType::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
