<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;

use Modules\User\App\Filters\UserFilters;
use Modules\User\App\Notifications\CustomEmailVerificationNotification;
use Modules\User\App\Notifications\CustomResetPasswordNotification;
use App\Scopes\CanDeleteScope;
use App\Scopes\DeveloperScope;
use Essa\APIToolKit\Filters\Filterable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens;
use ProtoneMedia\LaravelVerifyNewEmail\MustVerifyNewEmail;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasPermissions, HasRoles, MustVerifyNewEmail, Loggable, Filterable, CanDeleteScope, DeveloperScope;

    protected string $default_filters = UserFilters::class;

    protected $guard_name  = 'sanctum';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'api_key',
        'active_status',
        'dark_mode',
        'messenger_color',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // overide email verification
    public function sendEmailVerificationNotification()
    {
        $prefix = request()->header('Origin') . '/verify-email?url=';
        $this->notify(new CustomEmailVerificationNotification($prefix));
    }

    // overide email reset password
    public function sendPasswordResetNotification($token)
    {
        $host = request()->header('Origin');
        $this->notify(new CustomResetPasswordNotification($host, $token));
    }

    public function getGreetingAttribute()
    {
        $greetings = "";

        $time = date("H");

        if ($time < "12") {
            $greetings = trans('client.good_morning');
        } elseif ($time >= "12" && $time < "17") {
            $greetings = trans('client.good_afternoon');
        } elseif ($time >= "17" && $time < "19") {
            $greetings = trans('client.good_evening');
        } elseif ($time >= "19") {
            $greetings = trans('client.good_night');
        } else {
            $greetings = trans('client.welcome');
        }

        return $greetings;
    }

    public function scopeActive($query)
    {
        return $query->where('email_verified_at', '!=', null);
    }

    public function scopeHasEmail($query)
    {
        return $query->where('email', '!=', null)->where('email', 'NOT LIKE', "%@fakemail.com%");
    }

    public function scopeHasPhone($query)
    {
        return $query->where('phone', '!=', null);
    }

    public function scopeNotCurrent($query)
    {
        return $query->where('email', '!=', auth()->user()->email);
    }

    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    public function scopeNotVerified($query)
    {
        return $query->whereNull('email_verified_at');
    }

    public function getAvatarImageAttribute()
    {
        return $this->avatar ?? config('app.url') . '/users-avatar/avatar.png';
    }

    /**
     * Get all of the jobApplications for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobApplications(): HasMany
    {
        return $this->hasMany(\Modules\JobApplication\App\Models\JobApplication::class);
    }

    /**
     * Get the employee that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(\Modules\Employee\App\Models\Employee::class, 'username', 'nik')->with([
            'employeeContracts'
        ]);
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function applicantResume(): HasOne
    {
        return $this->hasOne(\Modules\Applicant\App\Models\ApplicantResume::class, 'nik', 'username');
    }

    /**
     * Get the firebaseToken associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function firebaseToken(): HasOne
    {
        return $this->hasOne(\Modules\User\App\Models\UserFirebaseToken::class, 'user_id', 'id');
    }

    /**
     * Get all of the logs for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs(): HasMany
    {
        return $this->hasMany(\Modules\Developer\App\Models\UserLogActivity::class, 'user_id', 'id');
    }

    /**
     * Get all of the notifications for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(\Modules\User\App\Models\UserNotification::class, 'user_id', 'id');
    }
}
