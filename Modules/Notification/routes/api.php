<?php

use Modules\Notification\App\Http\Controllers\API\Notification\NotificationTypeController;
use Modules\Notification\App\Http\Controllers\API\Notification\TemplateNotificationController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('notification')->group(function () {

    /*===========================
    =           templateNotifications           =
    =============================*/

    Route::apiResource('/templateNotifications', TemplateNotificationController::class)->parameters([
        'templateNotifications' => 'id'
    ]);

    Route::group([
        'prefix' => 'templateNotifications',
    ], function () {
        Route::get('{id}/restore', [TemplateNotificationController::class, 'restore']);
        Route::delete('{id}/force-delete', [TemplateNotificationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [TemplateNotificationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [TemplateNotificationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [TemplateNotificationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [TemplateNotificationController::class, 'export']);
    });
    /*=====  End of templateNotifications   ======*/

    /*===========================
    =           notificationTypes           =
    =============================*/

    Route::apiResource('/notificationTypes', NotificationTypeController::class)->parameters([
        'notificationTypes' => 'id'
    ])->middleware(['role:admin|developer|superadmin']);

    Route::group([
        'prefix' => 'notificationTypes',
    ], function () {
        Route::get('{id}/restore', [NotificationTypeController::class, 'restore']);
        Route::delete('{id}/force-delete', [NotificationTypeController::class, 'forceDelete']);
        Route::post('destroy-multiple', [NotificationTypeController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [NotificationTypeController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [NotificationTypeController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [NotificationTypeController::class, 'export']);
    });
    /*=====  End of notificationTypes   ======*/
});
