<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\JobApplication\App\Http\Controllers\JobApplicationController;
use Modules\JobApplication\App\Http\Controllers\JobApplicationStatusController;

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

Route::middleware(['force:json', 'multilang', 'auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    /*===========================
=           jobApplicationStatuses           =
=============================*/

    Route::apiResource('/jobApplicationStatuses', JobApplicationStatusController::class)->parameters([
        'jobApplicationStatuses' => 'id'
    ]);

    Route::group([
        'prefix' => 'jobApplicationStatuses',
    ], function () {
        Route::get('{id}/restore', [JobApplicationStatusController::class, 'restore']);
        Route::delete('{id}/force-delete', [JobApplicationStatusController::class, 'forceDelete']);
        Route::post('destroy-multiple', [JobApplicationStatusController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [JobApplicationStatusController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [JobApplicationStatusController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [JobApplicationStatusController::class, 'export']);
    });
    /*=====  End of jobApplicationStatuses   ======*/

    /*===========================
=           jobApplications           =
=============================*/

    Route::apiResource('/jobApplications', JobApplicationController::class)->parameters([
        'jobApplications' => 'id'
    ]);

    Route::group([
        'prefix' => 'jobApplications',
    ], function () {
        Route::get('{id}/restore', [JobApplicationController::class, 'restore']);
        Route::delete('{id}/force-delete', [JobApplicationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [JobApplicationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [JobApplicationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [JobApplicationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [JobApplicationController::class, 'export']);
    });

    /*=====  End of jobApplications   ======*/
});
