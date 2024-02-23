<?php

namespace Modules\Developer\App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\Developer\App\Filters\UserLogActivityFilters;
use Carbon\Carbon;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserLogActivity extends Model
{
    use HasFactory, Loggable, Filterable;

    protected string $default_filters = UserLogActivityFilters::class;

    protected $table = 'logs';

    private $userInstance = "\App\Models\User";

    public function __construct()
    {
        $userInstance = config('user-activity.model.user');
        if (!empty($userInstance)) $this->userInstance = $userInstance;
    }
    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    public $timestamps = false;

    protected $appends = ['dateHumanize', 'json_data'];

    public function getDateHumanizeAttribute()
    {
        return Carbon::parse($this->attributes['log_date'])->diffForHumans();
    }

    public function getJsonDataAttribute()
    {
        return json_decode($this->data, true);
    }

    public function user()
    {
        return $this->belongsTo($this->userInstance);
    }
}
