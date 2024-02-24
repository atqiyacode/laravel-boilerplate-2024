<?php

use Modules\Employee\App\Http\Controllers\EmployeeAchievementController;
use Modules\Employee\App\Http\Controllers\EmployeeAttachmentController;
use Modules\Employee\App\Http\Controllers\EmployeeAttendanceController;
use Modules\Employee\App\Http\Controllers\EmployeeCertificateOfExpertiseController;
use Modules\Employee\App\Http\Controllers\EmployeeContactController;
use Modules\Employee\App\Http\Controllers\EmployeeContractController;
use Modules\Employee\App\Http\Controllers\EmployeeDetailController;
use Modules\Employee\App\Http\Controllers\EmployeeEducationController;
use Modules\Employee\App\Http\Controllers\EmployeeExperienceController;
use Modules\Employee\App\Http\Controllers\EmployeeEmergencyContactController;
use Modules\Employee\App\Http\Controllers\EmployeeLanguageSkillController;
use Modules\Employee\App\Http\Controllers\EmployeeMediaSocialController;
use Modules\Employee\App\Http\Controllers\EmployeeOrganizationExperienceController;
use Modules\Employee\App\Http\Controllers\EmployeePermitController;
use Modules\Employee\App\Http\Controllers\EmployeePermitRemainingController;
use Modules\Employee\App\Http\Controllers\EmployeePermitStructureController;
use Modules\Employee\App\Http\Controllers\EmployeeRelationReferenceController;
use Modules\Employee\App\Http\Controllers\EmployeeController;
use Modules\Employee\App\Http\Controllers\EmployeeActivityController;
use Modules\Employee\App\Http\Controllers\EmployeePerformanceAssessmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('employee')->group(function () {
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
    =           employeeDetails           =
    =============================*/

    Route::apiResource('/employeeDetails', EmployeeDetailController::class)->parameters([
        'employeeDetails' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeDetails',
    ], function () {
        Route::get('{id}/restore', [EmployeeDetailController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeDetailController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeDetailController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeDetailController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeDetailController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeDetailController::class, 'export']);
    });
    /*=====  End of employeeDetails   ======*/

    /*===========================
    =           employeeContacts           =
    =============================*/

    Route::apiResource('/employeeContacts', EmployeeContactController::class)->parameters([
        'employeeContacts' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeContacts',
    ], function () {
        Route::get('{id}/restore', [EmployeeContactController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeContactController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeContactController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeContactController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeContactController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeContactController::class, 'export']);
    });
    /*=====  End of employeeContacts   ======*/

    /*===========================
    =           employeeEmergencyContacts           =
    =============================*/

    Route::apiResource('/employeeEmergencyContacts', EmployeeEmergencyContactController::class)->parameters([
        'employeeEmergencyContacts' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeEmergencyContacts',
    ], function () {
        Route::get('{id}/restore', [EmployeeEmergencyContactController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeEmergencyContactController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeEmergencyContactController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeEmergencyContactController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeEmergencyContactController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeEmergencyContactController::class, 'export']);
    });
    /*=====  End of employeeEmergencyContacts   ======*/

    /*===========================
    =           employeeContracts           =
    =============================*/

    Route::apiResource('/employeeContracts', EmployeeContractController::class)->parameters([
        'employeeContracts' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeContracts',
    ], function () {
        Route::get('{id}/restore', [EmployeeContractController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeContractController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeContractController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeContractController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeContractController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeContractController::class, 'export']);
    });
    /*=====  End of employeeContracts   ======*/

    /*===========================
    =           employeeAttendances           =
    =============================*/

    Route::apiResource('/employeeAttendances', EmployeeAttendanceController::class)->parameters([
        'employeeAttendances' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeAttendances',
    ], function () {
        Route::get('{id}/restore', [EmployeeAttendanceController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeAttendanceController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeAttendanceController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeAttendanceController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeAttendanceController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeAttendanceController::class, 'export']);
    });
    /*=====  End of employeeAttendances   ======*/

    /*===========================
    =           employeePermitStructures           =
    =============================*/

    Route::apiResource('/employeePermitStructures', EmployeePermitStructureController::class)->parameters([
        'employeePermitStructures' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeePermitStructures',
    ], function () {
        Route::get('{id}/restore', [EmployeePermitStructureController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeePermitStructureController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeePermitStructureController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeePermitStructureController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeePermitStructureController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeePermitStructureController::class, 'export']);
    });
    /*=====  End of employeePermitStructures   ======*/

    /*===========================
    =           employeePermitRemainings           =
    =============================*/

    Route::apiResource('/employeePermitRemainings', EmployeePermitRemainingController::class)->parameters([
        'employeePermitRemainings' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeePermitRemainings',
    ], function () {
        Route::get('{id}/restore', [EmployeePermitRemainingController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeePermitRemainingController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeePermitRemainingController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeePermitRemainingController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeePermitRemainingController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeePermitRemainingController::class, 'export']);
    });
    /*=====  End of employeePermitRemainings   ======*/

    /*===========================
    =           employeePermits           =
    =============================*/

    Route::apiResource('/employeePermits', EmployeePermitController::class)->parameters([
        'employeePermits' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeePermits',
    ], function () {
        Route::get('{id}/restore', [EmployeePermitController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeePermitController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeePermitController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeePermitController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeePermitController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeePermitController::class, 'export']);
    });
    /*=====  End of employeePermits   ======*/

    /*===========================
    =           employeeEducations           =
    =============================*/

    Route::apiResource('/employeeEducations', EmployeeEducationController::class)->parameters([
        'employeeEducations' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeEducations',
    ], function () {
        Route::get('{id}/restore', [EmployeeEducationController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeEducationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeEducationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeEducationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeEducationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeEducationController::class, 'export']);
    });

    /*=====  End of employeeEducations   ======*/

    /*===========================
    =           employeeExperiences           =
    =============================*/

    Route::apiResource('/employeeExperiences', EmployeeExperienceController::class)->parameters([
        'employeeExperiences' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeExperiences',
    ], function () {
        Route::get('{id}/restore', [EmployeeExperienceController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeExperienceController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeExperienceController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeExperienceController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeExperienceController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeExperienceController::class, 'export']);
    });
    /*=====  End of employeeExperiences   ======*/

    /*===========================
    =           employeeLanguageSkills           =
    =============================*/

    Route::apiResource('/employeeLanguageSkills', EmployeeLanguageSkillController::class)->parameters([
        'employeeLanguageSkills' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeLanguageSkills',
    ], function () {
        Route::get('{id}/restore', [EmployeeLanguageSkillController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeLanguageSkillController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeLanguageSkillController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeLanguageSkillController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeLanguageSkillController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeLanguageSkillController::class, 'export']);
    });
    /*=====  End of employeeLanguageSkills   ======*/

    /*===========================
    =           employeeOrganizationExperiences           =
    =============================*/

    Route::apiResource('/employeeOrganizationExperiences', EmployeeOrganizationExperienceController::class)->parameters([
        'employeeOrganizationExperiences' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeOrganizationExperiences',
    ], function () {
        Route::get('{id}/restore', [EmployeeOrganizationExperienceController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeOrganizationExperienceController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeOrganizationExperienceController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeOrganizationExperienceController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeOrganizationExperienceController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeOrganizationExperienceController::class, 'export']);
    });
    /*=====  End of employeeOrganizationExperiences   ======*/

    /*===========================
    =           employeeCertificateOfExpertises           =
    =============================*/

    Route::apiResource('/employeeCertificateOfExpertises', EmployeeCertificateOfExpertiseController::class)->parameters([
        'employeeCertificateOfExpertises' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeCertificateOfExpertises',
    ], function () {
        Route::get('{id}/restore', [EmployeeCertificateOfExpertiseController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeCertificateOfExpertiseController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeCertificateOfExpertiseController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeCertificateOfExpertiseController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeCertificateOfExpertiseController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeCertificateOfExpertiseController::class, 'export']);
    });
    /*=====  End of employeeCertificateOfExpertises   ======*/

    /*===========================
    =           employeeAttachments           =
    =============================*/

    Route::apiResource('/employeeAttachments', EmployeeAttachmentController::class)->parameters([
        'employeeAttachments' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeAttachments',
    ], function () {
        Route::get('{id}/restore', [EmployeeAttachmentController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeAttachmentController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeAttachmentController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeAttachmentController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeAttachmentController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeAttachmentController::class, 'export']);
    });
    /*=====  End of employeeAttachments   ======*/

    /*===========================
    =           employeeRelationReferences           =
    =============================*/

    Route::apiResource('/employeeRelationReferences', EmployeeRelationReferenceController::class)->parameters([
        'employeeRelationReferences' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeRelationReferences',
    ], function () {
        Route::get('{id}/restore', [EmployeeRelationReferenceController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeRelationReferenceController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeRelationReferenceController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeRelationReferenceController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeRelationReferenceController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeRelationReferenceController::class, 'export']);
    });
    /*=====  End of employeeRelationReferences   ======*/

    /*===========================
    =           employeeMediaSocial           =
    =============================*/

    Route::apiResource('/employeeMediaSocial', EmployeeMediaSocialController::class)->parameters([
        'employeeMediaSocial' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeMediaSocial',
    ], function () {
        Route::get('{id}/restore', [EmployeeMediaSocialController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeMediaSocialController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeMediaSocialController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeMediaSocialController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeMediaSocialController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeMediaSocialController::class, 'export']);
    });
    /*=====  End of employeeMediaSocial   ======*/

    /*===========================
    =           employeeAchievements           =
    =============================*/

    Route::apiResource('/employeeAchievements', EmployeeAchievementController::class)->parameters([
        'employeeAchievements' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeAchievements',
    ], function () {
        Route::get('{id}/restore', [EmployeeAchievementController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeAchievementController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeAchievementController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeAchievementController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeAchievementController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeAchievementController::class, 'export']);
    });
    /*=====  End of employeeAchievements   ======*/

    /*===========================
    =           employeeActivities           =
    =============================*/

    Route::apiResource('/employeeActivities', EmployeeActivityController::class)->parameters([
        'employeeActivities' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeeActivities',
    ], function () {
        Route::get('{id}/restore', [EmployeeActivityController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeeActivityController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeeActivityController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeeActivityController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeeActivityController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeeActivityController::class, 'export']);
    });
    /*=====  End of employeeActivities   ======*/



    /*===========================
    =           employeePerformanceAssessments           =
    =============================*/

    Route::apiResource('/employeePerformanceAssessments', EmployeePerformanceAssessmentController::class)->parameters([
        'employeePerformanceAssessments' => 'id'
    ]);

    Route::group([
        'prefix' => 'employeePerformanceAssessments',
    ], function () {
        Route::get('{id}/restore', [EmployeePerformanceAssessmentController::class, 'restore']);
        Route::delete('{id}/force-delete', [EmployeePerformanceAssessmentController::class, 'forceDelete']);
        Route::post('destroy-multiple', [EmployeePerformanceAssessmentController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [EmployeePerformanceAssessmentController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [EmployeePerformanceAssessmentController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [EmployeePerformanceAssessmentController::class, 'export']);
    });
    /*=====  End of employeePerformanceAssessments   ======*/
});
