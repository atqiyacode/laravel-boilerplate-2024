<?php

use Modules\HRMaster\App\Http\Controllers\FieldOfWorkController;
use Modules\HRMaster\App\Http\Controllers\PositionController;
use Modules\HRMaster\App\Http\Controllers\TypeOfPermitController;
use Modules\HRMaster\App\Http\Controllers\WorkingAreaController;
use Modules\HRMaster\App\Http\Controllers\MainClassController;
use Modules\HRMaster\App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('hr')->group(function () {

    /*===========================
    =           units           =
    =============================*/

    Route::apiResource('/units', UnitController::class)->parameters([
        'units' => 'id'
    ]);

    Route::group([
        'prefix' => 'units',
    ], function () {
        Route::get('{id}/restore', [UnitController::class, 'restore']);
        Route::delete('{id}/force-delete', [UnitController::class, 'forceDelete']);
        Route::post('destroy-multiple', [UnitController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [UnitController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [UnitController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [UnitController::class, 'export']);
    });
    /*=====  End of units   ======*/

    /*===========================
    =           mainClasses           =
    =============================*/
    Route::apiResource('/mainClasses', MainClassController::class)->parameters([
        'mainClasses' => 'id'
    ]);

    Route::group([
        'prefix' => 'mainClasses',
    ], function () {
        Route::get('{id}/restore', [MainClassController::class, 'restore']);
        Route::delete('{id}/force-delete', [MainClassController::class, 'forceDelete']);
        Route::post('destroy-multiple', [MainClassController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [MainClassController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [MainClassController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [MainClassController::class, 'export']);
    });
    /*=====  End of mainClasses   ======*/

    /*===========================
    =           positions           =
    =============================*/

    Route::apiResource('/positions', PositionController::class)->parameters([
        'positions' => 'id'
    ]);

    Route::group([
        'prefix' => 'positions',
    ], function () {
        Route::get('{id}/restore', [PositionController::class, 'restore']);
        Route::delete('{id}/force-delete', [PositionController::class, 'forceDelete']);
        Route::post('destroy-multiple', [PositionController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [PositionController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [PositionController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [PositionController::class, 'export']);
    });
    /*=====  End of positions   ======*/

    /*===========================
    =           fieldOfWorks           =
    =============================*/

    Route::apiResource('/fieldOfWorks', FieldOfWorkController::class)->parameters([
        'fieldOfWorks' => 'id'
    ]);

    Route::group([
        'prefix' => 'fieldOfWorks',
    ], function () {
        Route::get('{id}/restore', [FieldOfWorkController::class, 'restore']);
        Route::delete('{id}/force-delete', [FieldOfWorkController::class, 'forceDelete']);
        Route::post('destroy-multiple', [FieldOfWorkController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [FieldOfWorkController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [FieldOfWorkController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [FieldOfWorkController::class, 'export']);
    });
    /*=====  End of fieldOfWorks   ======*/

    /*===========================
    =           workingAreas           =
    =============================*/

    Route::apiResource('/workingAreas', WorkingAreaController::class)->parameters([
        'workingAreas' => 'id'
    ]);

    Route::group([
        'prefix' => 'workingAreas',
    ], function () {
        Route::get('{id}/restore', [WorkingAreaController::class, 'restore']);
        Route::delete('{id}/force-delete', [WorkingAreaController::class, 'forceDelete']);
        Route::post('destroy-multiple', [WorkingAreaController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [WorkingAreaController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [WorkingAreaController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [WorkingAreaController::class, 'export']);
    });
    /*=====  End of workingAreas   ======*/

    /*===========================
    =           typeOfPermits           =
    =============================*/

    Route::apiResource('/typeOfPermits', TypeOfPermitController::class)->parameters([
        'typeOfPermits' => 'id'
    ]);

    Route::group([
        'prefix' => 'typeOfPermits',
    ], function () {
        Route::get('{id}/restore', [TypeOfPermitController::class, 'restore']);
        Route::delete('{id}/force-delete', [TypeOfPermitController::class, 'forceDelete']);
        Route::post('destroy-multiple', [TypeOfPermitController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [TypeOfPermitController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [TypeOfPermitController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [TypeOfPermitController::class, 'export']);
    });
    /*=====  End of typeOfPermits   ======*/
});
