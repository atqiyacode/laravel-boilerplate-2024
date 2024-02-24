<?php

use Modules\HRMaster\App\Http\Controllers\API\HR\EmployeeController;
use Modules\HRMaster\App\Http\Controllers\API\HR\FieldOfWorkController;
use Modules\HRMaster\App\Http\Controllers\API\HR\JobApplicationController;
use Modules\HRMaster\App\Http\Controllers\API\HR\JobApplicationStatusController;
use Modules\HRMaster\App\Http\Controllers\API\HR\PositionController;
use Modules\HRMaster\App\Http\Controllers\API\HR\TypeOfPermitController;
use Modules\HRMaster\App\Http\Controllers\API\HR\WorkingAreaController;
use Modules\HRMaster\App\Http\Controllers\API\HR\JobVacancyController;
use Modules\HRMaster\App\Http\Controllers\API\HR\MainClassController;
use Modules\HRMaster\App\Http\Controllers\API\HR\ProjectController;
use Modules\HRMaster\App\Http\Controllers\API\HR\UnitController;
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

    /*===========================
    =           employees           =
    =============================*/

    Route::apiResource('/employees', EmployeeController::class)->parameters([
        'employees' => 'id'
    ]);

    Route::group([
        'prefix' => 'employees',
    ], function () {
        Route::get('{id}/restore', [EmployeeController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeController::class, 'export']);
    });
    /*=====  End of employees   ======*/


    /*===========================
=           projects           =
=============================*/

    Route::apiResource('/projects', ProjectController::class)->parameters([
        'projects' => 'id'
    ]);

    Route::group([
        'prefix' => 'projects',
    ], function () {
        Route::get('{id}/restore', [ProjectController::class, 'restore']);
        Route::delete('{id}/force-delete', [ProjectController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ProjectController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ProjectController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ProjectController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ProjectController::class, 'export']);
    });
    /*=====  End of projects   ======*/

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
