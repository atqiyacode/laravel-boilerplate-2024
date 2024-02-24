<?php

use Modules\Developer\App\Http\Controllers\FailedJobController;
use Modules\Developer\App\Http\Controllers\UserLogActivityController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('developer')->group(function () {
    /*===========================
    =           userLogActivities           =
    =============================*/

    Route::apiResource('/userLogActivities', UserLogActivityController::class)->parameters([
        'userLogActivities' => 'id'
    ]);

    Route::group([
        'prefix' => 'userLogActivities',
    ], function () {
        Route::get('{id}/restore', [UserLogActivityController::class, 'restore']);
        Route::delete('{id}/force-delete', [UserLogActivityController::class, 'forceDelete']);
        Route::post('destroy-multiple', [UserLogActivityController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [UserLogActivityController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [UserLogActivityController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [UserLogActivityController::class, 'export']);
    });

    /*=====  End of userLogActivities   ======*/

    /*===========================
    =           failedJobs           =
    =============================*/

    Route::apiResource('/failedJobs', FailedJobController::class)->parameters([
        'failedJobs' => 'id'
    ]);

    Route::group([
        'prefix' => 'failedJobs',
    ], function () {
        Route::get('{id}/restore', [FailedJobController::class, 'restore']);
        Route::delete('{id}/force-delete', [FailedJobController::class, 'forceDelete']);
        Route::post('destroy-multiple', [FailedJobController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [FailedJobController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [FailedJobController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [FailedJobController::class, 'export']);
    });

    Route::group([
        'prefix' => 'handleJob',
    ], function () {
        Route::post('forget/all', [FailedJobController::class, 'forgetAll']);
        Route::post('retry/all', [FailedJobController::class, 'retryAll']);
        Route::get('{uuid}/retry', [FailedJobController::class, 'retry']);
        Route::get('{uuid}/forget', [FailedJobController::class, 'forget']);
    });

    /*=====  End of failedJobs   ======*/
});
