<?php

use Modules\Auth\App\Http\Controllers\AuthenticatedSessionController;
use Modules\Auth\App\Http\Controllers\EmailVerificationNotificationController;
use Modules\Auth\App\Http\Controllers\NewPasswordController;
use Modules\Auth\App\Http\Controllers\PasswordResetLinkController;
use Modules\Auth\App\Http\Controllers\RegisteredUserController;
use Modules\Auth\App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Resources\User\CurrentUserResource;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::prefix('auth')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('login');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.store');

    Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['auth:sanctum', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:sanctum', 'throttle:6,1'])
        ->name('verification.send');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:sanctum')
        ->name('logout');

    // others
    Route::get('/session', function () {
        return new CurrentUserResource(auth()->user());
    })->middleware(['auth:sanctum', 'verified']);

    Route::get('/authVerificationMethod', function () {
        $data = [
            ['id' => 1, 'slug' => 'email', 'name' => 'Email'],
            ['id' => 2, 'slug' => 'whatsapp', 'name' => 'whatsapp'],
        ];
        return $data;
    })->middleware(['guest']);

    // Route::post('/generateTokenCode', [GenerateTokenCodeController::class, 'index'])
    //     ->middleware(['guest', 'throttle:6,1']);

    // Route::post('/login/verify', [AuthenticatedSessionController::class, 'verify'])
    //     ->middleware(['throttle:6,1']);
});
