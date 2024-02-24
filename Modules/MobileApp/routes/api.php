<?php

use Modules\MobileApp\App\Http\Controllers\MobileAppMenuController;
use Modules\MobileApp\App\Http\Controllers\MobileNewsController;
use Modules\MobileApp\App\Http\Controllers\MobileServerController;
use Modules\MobileApp\App\Http\Controllers\MobileVersionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('mobile')->group(function () {

    /*===========================
    =           mobileNews           =
    =============================*/

    Route::apiResource('/mobileNews', MobileNewsController::class)->parameters([
        'mobileNews' => 'id'
    ]);

    Route::group([
        'prefix' => 'mobileNews',
    ], function () {
        Route::get('{id}/restore', [MobileNewsController::class, 'restore']);
        Route::delete('{id}/force-delete', [MobileNewsController::class, 'forceDelete']);
        Route::post('destroy-multiple', [MobileNewsController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [MobileNewsController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [MobileNewsController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [MobileNewsController::class, 'export']);
    });
    /*=====  End of mobileNews   ======*/


    /*===========================
    =           mobileServers           =
    =============================*/

    Route::apiResource('/mobileServers', MobileServerController::class)->parameters([
        'mobileServers' => 'id'
    ])->only(['index', 'store']);

    /*=====  End of mobileServers   ======*/

    /*===========================
    =           mobileVersions           =
    =============================*/

    Route::apiResource('/mobileVersions', MobileVersionController::class)->parameters([
        'mobileVersions' => 'id'
    ]);

    Route::group([
        'prefix' => 'mobileVersions',
    ], function () {
        Route::get('{id}/restore', [MobileVersionController::class, 'restore']);
        Route::delete('{id}/force-delete', [MobileVersionController::class, 'forceDelete']);
        Route::post('destroy-multiple', [MobileVersionController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [MobileVersionController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [MobileVersionController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [MobileVersionController::class, 'export']);
    });
    /*=====  End of mobileVersions   ======*/

    /*===========================
    =           mobileAppMenus           =
    =============================*/

    Route::apiResource('/mobileAppMenus', MobileAppMenuController::class)->parameters([
        'mobileAppMenus' => 'id'
    ]);

    Route::group([
        'prefix' => 'mobileAppMenus',
    ], function () {
        Route::get('{id}/restore', [MobileAppMenuController::class, 'restore']);
        Route::delete('{id}/force-delete', [MobileAppMenuController::class, 'forceDelete']);
        Route::post('destroy-multiple', [MobileAppMenuController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [MobileAppMenuController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [MobileAppMenuController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [MobileAppMenuController::class, 'export']);
    });

    /*=====  End of mobileAppMenus   ======*/
});
