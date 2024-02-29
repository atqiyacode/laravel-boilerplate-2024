<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\JobVacancy\App\Http\Controllers\JobVacancyController;

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

Route::middleware(['auth:sanctum'])->prefix('jobVacancy')->group(function () {
    /*===========================
    =           jobVacancies           =
    =============================*/

    Route::apiResource('/jobVacancies', JobVacancyController::class)->parameters([
        'jobVacancies' => 'id'
    ]);

    Route::group([
        'prefix' => 'jobVacancies',
    ], function () {
        Route::get('{id}/restore', [JobVacancyController::class, 'restore']);
        Route::delete('{id}/force-delete', [JobVacancyController::class, 'forceDelete']);
        Route::post('destroy-multiple', [JobVacancyController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [JobVacancyController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [JobVacancyController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [JobVacancyController::class, 'export']);
    });

    /*=====  End of jobVacancies   ======*/
});
