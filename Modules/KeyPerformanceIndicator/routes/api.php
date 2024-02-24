<?php

use Modules\KeyPerformanceIndicator\Http\Controllers\PerformanceAssessmentController;
use Modules\KeyPerformanceIndicator\Http\Controllers\TypeOfActivityController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('kpi')->group(function () {

    /*===========================
    =           typeOfActivities           =
    =============================*/

    Route::apiResource('/typeOfActivities', TypeOfActivityController::class)->parameters([
        'typeOfActivities' => 'id'
    ]);

    Route::group([
        'prefix' => 'typeOfActivities',
    ], function () {
        Route::get('{id}/restore', [TypeOfActivityController::class, 'restore']);
        Route::delete('{id}/force-delete', [TypeOfActivityController::class, 'forceDelete']);
        Route::post('destroy-multiple', [TypeOfActivityController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [TypeOfActivityController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [TypeOfActivityController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [TypeOfActivityController::class, 'export']);
    });
    /*=====  End of typeOfActivities   ======*/

    /*===========================
    =           performanceAssessments           =
    =============================*/

    Route::apiResource('/performanceAssessments', PerformanceAssessmentController::class)->parameters([
        'performanceAssessments' => 'id'
    ]);

    Route::group([
        'prefix' => 'performanceAssessments',
    ], function () {
        Route::get('{id}/restore', [PerformanceAssessmentController::class, 'restore']);
        Route::delete('{id}/force-delete', [PerformanceAssessmentController::class, 'forceDelete']);
        Route::post('destroy-multiple', [PerformanceAssessmentController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [PerformanceAssessmentController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [PerformanceAssessmentController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [PerformanceAssessmentController::class, 'export']);
    });
    /*=====  End of performanceAssessments   ======*/
});
