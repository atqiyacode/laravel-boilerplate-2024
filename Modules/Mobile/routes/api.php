<?php

use Illuminate\Support\Facades\Broadcast;
use Modules\Mobile\App\Http\Controllers\CheckUpdateController;
use Modules\Mobile\App\Http\Controllers\MobileAttendanceController;
use Modules\Mobile\App\Http\Controllers\MobileContactController;
use Modules\Mobile\App\Http\Controllers\MobileContractController;
use Modules\Mobile\App\Http\Controllers\MobileEducationController;
use Modules\Mobile\App\Http\Controllers\MobileEmergencyContactController;
use Modules\Mobile\App\Http\Controllers\MobileExperienceController;
use Modules\Mobile\App\Http\Controllers\MobileMediaSocialController;
use Modules\Mobile\App\Http\Controllers\MobileNotificationController;
use Modules\Mobile\App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Broadcast::routes([
    'middleware' => ['auth:sanctum']
]);

Route::get('mobileAppServerStatus', [CheckUpdateController::class, 'mobileAppServerStatus']);

Route::get('/server-time', function () {
    return response()->json([
        'time' => now()->format('H:i:s'),
        'date' => now()->isoFormat('LL'),
    ], 200);
});

Route::middleware(['auth:sanctum', 'role:employee'])->prefix('modules')->group(function () {

    Route::prefix('attendance')->group(function () {
        Route::get('/', [MobileAttendanceController::class, 'index']);
        Route::post('checkIn', [MobileAttendanceController::class, 'checkIn']);
        Route::post('checkOut', [MobileAttendanceController::class, 'checkOut']);
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [MobileContactController::class, 'index']);
    });

    Route::apiResource('/notifications', MobileNotificationController::class)->parameters([
        'notifications' => 'id',
    ]);

    Route::apiResource('/emergencyContacts', MobileEmergencyContactController::class)->parameters([
        'emergencyContacts' => 'id',
    ]);

    Route::apiResource('/education', MobileEducationController::class)->parameters([
        'education' => 'id',
    ]);

    Route::apiResource('/experiences', MobileExperienceController::class)->parameters([
        'experiences' => 'id',
    ]);

    Route::apiResource('/contracts', MobileContractController::class)->parameters([
        'contracts' => 'id',
    ]);

    Route::apiResource('/mediaSocial', MobileMediaSocialController::class)->parameters([
        'mediaSocial' => 'id',
    ]);
});

Route::middleware(['auth:sanctum', 'role:employee'])->prefix('personal')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::get('/loginHistory', [ProfileController::class, 'loginHistory']);
    Route::post('/loginHistory', [ProfileController::class, 'deleteLoginHistory']);
});
