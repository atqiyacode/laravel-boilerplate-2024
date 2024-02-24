<?php

use Modules\Master\App\Http\Controllers\API\Master\CompanyInformationController;
use Modules\Master\App\Http\Controllers\API\Master\EmployeeTypeController;
use Modules\Master\App\Http\Controllers\API\Master\GenderController;
use Modules\Master\App\Http\Controllers\API\Master\LevelOfEducationController;
use Modules\Master\App\Http\Controllers\API\Master\PermissionController;
use Modules\Master\App\Http\Controllers\API\Master\PermitStatusController;
use Modules\Master\App\Http\Controllers\API\Master\ReligionController;
use Modules\Master\App\Http\Controllers\API\Master\RoleController;
use Modules\Master\App\Http\Controllers\API\Master\UniversityController;
use Modules\Master\App\Http\Controllers\API\Master\VerificationCodeTypeController;
use Modules\Master\App\Http\Controllers\API\Master\StudyProgramController;
use Modules\Master\App\Http\Controllers\API\Master\UploadController;
use Modules\Master\App\Http\Controllers\API\Master\RecruitmentStepController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('master')->group(function () {

    Route::middleware(['role:admin|superadmin|applicant', 'throttle:getimage'])->group(function () {
        // general upload
        Route::post('upload', [UploadController::class, 'upload']);
        Route::get('user-files', [UploadController::class, 'returnFile']);
    });
    /*===========================
    =           roles           =
    =============================*/

    Route::apiResource('/roles', RoleController::class)->parameters([
        'roles' => 'id',
    ]);

    Route::group([
        'prefix' => 'roles',
    ], function () {
        Route::get('{id}/restore', [RoleController::class, 'restore']);
        Route::delete('{id}/force-delete', [RoleController::class, 'forceDelete']);
        Route::post('destroy-multiple', [RoleController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [RoleController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [RoleController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [RoleController::class, 'export']);
    });
    /*=====  End of roles   ======*/

    /*===========================
    =           permissions           =
    =============================*/

    Route::apiResource('/permissions', PermissionController::class)->parameters([
        'permissions' => 'id',
    ]);

    Route::group([
        'prefix' => 'permissions',
    ], function () {
        Route::get('{id}/restore', [PermissionController::class, 'restore']);
        Route::delete('{id}/force-delete', [PermissionController::class, 'forceDelete']);
        Route::post('destroy-multiple', [PermissionController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [PermissionController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [PermissionController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [PermissionController::class, 'export']);
    });
    /*=====  End of permissions   ======*/

    /*===========================
    =           verificationCodeTypes           =
    =============================*/

    Route::apiResource('/verificationCodeTypes', VerificationCodeTypeController::class)->parameters([
        'verificationCodeTypes' => 'id',
    ]);

    Route::group([
        'prefix' => 'verificationCodeTypes',
    ], function () {
        Route::get('{id}/restore', [VerificationCodeTypeController::class, 'restore']);
        Route::delete('{id}/force-delete', [VerificationCodeTypeController::class, 'forceDelete']);
        Route::post('destroy-multiple', [VerificationCodeTypeController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [VerificationCodeTypeController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [VerificationCodeTypeController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [VerificationCodeTypeController::class, 'export']);
    });
    /*=====  End of verificationCodeTypes   ======*/


    /*===========================
    =           religions           =
    =============================*/

    Route::apiResource('/religions', ReligionController::class)->parameters([
        'religions' => 'id'
    ]);

    Route::group([
        'prefix' => 'religions',
    ], function () {
        Route::get('{id}/restore', [ReligionController::class, 'restore']);
        Route::delete('{id}/force-delete', [ReligionController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ReligionController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ReligionController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ReligionController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ReligionController::class, 'export']);
    });
    /*=====  End of religions   ======*/

    /*===========================
    =           genders           =
    =============================*/

    Route::apiResource('/genders', GenderController::class)->parameters([
        'genders' => 'id'
    ]);

    Route::group([
        'prefix' => 'genders',
    ], function () {
        Route::get('{id}/restore', [GenderController::class, 'restore']);
        Route::delete('{id}/force-delete', [GenderController::class, 'forceDelete']);
        Route::post('destroy-multiple', [GenderController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [GenderController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [GenderController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [GenderController::class, 'export']);
    });
    /*=====  End of genders   ======*/

    /*===========================
    =           levelOfEducations           =
    =============================*/

    Route::apiResource('/levelOfEducations', LevelOfEducationController::class)->parameters([
        'levelOfEducations' => 'id'
    ]);

    Route::group([
        'prefix' => 'levelOfEducations',
    ], function () {
        Route::get('{id}/restore', [LevelOfEducationController::class, 'restore']);
        Route::delete('{id}/force-delete', [LevelOfEducationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [LevelOfEducationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [LevelOfEducationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [LevelOfEducationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [LevelOfEducationController::class, 'export']);
    });
    /*=====  End of levelOfEducations   ======*/

    /*===========================
    =           permitStatuses           =
    =============================*/

    Route::apiResource('/permitStatuses', PermitStatusController::class)->parameters([
        'permitStatuses' => 'id'
    ]);

    Route::group([
        'prefix' => 'permitStatuses',
    ], function () {
        Route::get('{id}/restore', [PermitStatusController::class, 'restore']);
        Route::delete('{id}/force-delete', [PermitStatusController::class, 'forceDelete']);
        Route::post('destroy-multiple', [PermitStatusController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [PermitStatusController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [PermitStatusController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [PermitStatusController::class, 'export']);
    });
    /*=====  End of permitStatuses   ======*/

    /*===========================
    =           universities           =
    =============================*/

    Route::apiResource('/universities', UniversityController::class)->parameters([
        'universities' => 'id'
    ]);

    Route::group([
        'prefix' => 'universities',
    ], function () {
        Route::get('{id}/restore', [UniversityController::class, 'restore']);
        Route::delete('{id}/force-delete', [UniversityController::class, 'forceDelete']);
        Route::post('destroy-multiple', [UniversityController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [UniversityController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [UniversityController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [UniversityController::class, 'export']);
        Route::get('get/fromPDDIKTI', [UniversityController::class, 'getFromPDDIKTI']);
    });
    /*=====  End of universities   ======*/

    /*===========================
    =           employeeTypes           =
    =============================*/

    Route::apiResource('/employeeTypes', EmployeeTypeController::class)->parameters([
        'employeeTypes' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeTypes',
    ], function () {
        Route::get('{id}/restore', [EmployeeTypeController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeTypeController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeTypeController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeTypeController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeTypeController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeTypeController::class, 'export']);
    });
    /*=====  End of employeeTypes   ======*/


    /*===========================
    =           studyPrograms           =
    =============================*/

    Route::apiResource('/studyPrograms', StudyProgramController::class);

    Route::group([
        'prefix' => 'studyPrograms',
    ], function () {
        Route::get('{id}/restore', [StudyProgramController::class, 'restore']);
        Route::delete('{id}/force-delete', [StudyProgramController::class, 'forceDelete']);
        Route::post('destroy-multiple', [StudyProgramController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [StudyProgramController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [StudyProgramController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [StudyProgramController::class, 'export']);
        Route::get('get/fromPDDIKTI', [StudyProgramController::class, 'getFromPDDIKTI']);
    });
    /*=====  End of studyPrograms   ======*/

    /*===========================
=           recruitmentSteps           =
=============================*/

    Route::apiResource('/recruitmentSteps', RecruitmentStepController::class);

    Route::group([
        'prefix' => 'recruitmentSteps',
    ], function () {
        Route::get('{id}/restore', [RecruitmentStepController::class, 'restore']);
        Route::delete('{id}/force-delete', [RecruitmentStepController::class, 'forceDelete']);
        Route::post('destroy-multiple', [RecruitmentStepController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [RecruitmentStepController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [RecruitmentStepController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [RecruitmentStepController::class, 'export']);
    });

    /*=====  End of recruitmentSteps   ======*/

    /*===========================
=           companyInformations           =
=============================*/

    Route::apiResource('/companyInformations', CompanyInformationController::class)->only('index', 'store', 'show', 'update');

    /*=====  End of companyInformations   ======*/
});
