<?php

use Modules\User\App\Http\Controllers\API\User\UserController;
use Modules\User\App\Http\Controllers\API\User\UserFirebaseTokenController;
use Modules\User\App\Http\Controllers\API\User\UserNotificationController;
use Modules\User\App\Http\Controllers\API\User\UserVerificationCodeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('user')->group(function () {
    /*===========================
    =           users           =
    =============================*/

    Route::apiResource('/users', UserController::class)->parameters([
        'users' => 'id',
    ]);

    Route::group([
        'prefix' => 'users',
    ], function () {
        Route::get('{id}/restore', [UserController::class, 'restore']);
        Route::delete('{id}/force-delete', [UserController::class, 'forceDelete']);
        Route::post('destroy-multiple', [UserController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [UserController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [UserController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [UserController::class, 'export']);
    });
    /*=====  End of users   ======*/

    /*===========================
    =           userVerificationCodes           =
    =============================*/

    Route::apiResource('/userVerificationCodes', UserVerificationCodeController::class)->parameters([
        'userVerificationCodes' => 'id',
    ]);

    Route::group([
        'prefix' => 'userVerificationCodes',
    ], function () {
        Route::get('{id}/restore', [UserVerificationCodeController::class, 'restore']);
        Route::delete('{id}/force-delete', [UserVerificationCodeController::class, 'forceDelete']);
        Route::post('destroy-multiple', [UserVerificationCodeController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [UserVerificationCodeController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [UserVerificationCodeController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [UserVerificationCodeController::class, 'export']);
    });
    /*=====  End of userVerificationCodes   ======*/

    /*===========================
    =           userFirebaseTokens           =
    =============================*/

    Route::apiResource('/userFirebaseTokens', UserFirebaseTokenController::class)->parameters([
        'userFirebaseTokens' => 'id'
    ]);
    Route::group([
        'prefix' => 'userFirebaseTokens',
    ], function () {
        Route::get('{id}/restore', [UserFirebaseTokenController::class, 'restore']);
        Route::delete('{id}/force-delete', [UserFirebaseTokenController::class, 'forceDelete']);
        Route::post('destroy-multiple', [UserFirebaseTokenController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [UserFirebaseTokenController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [UserFirebaseTokenController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [UserFirebaseTokenController::class, 'export']);
    });

    /*=====  End of userFirebaseTokens   ======*/

    /*===========================
    =           userNotifications           =
    =============================*/

    Route::apiResource('/userNotifications', UserNotificationController::class)->parameters([
        'userNotifications' => 'id'
    ]);

    Route::group([
        'prefix' => 'userNotifications',
    ], function () {
        Route::get('{id}/restore', [UserNotificationController::class, 'restore']);
        Route::delete('{id}/force-delete', [UserNotificationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [UserNotificationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [UserNotificationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [UserNotificationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [UserNotificationController::class, 'export']);
    });
    /*=====  End of userNotifications   ======*/
});
