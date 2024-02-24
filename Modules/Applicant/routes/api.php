<?php

use Modules\Applicant\App\Http\Controllers\ApplicantAchievementController;
use Modules\Applicant\App\Http\Controllers\ApplicantAttachmentController;
use Modules\Applicant\App\Http\Controllers\ApplicantCertificateOfExpertiseController;
use Modules\Applicant\App\Http\Controllers\ApplicantContactController;
use Modules\Applicant\App\Http\Controllers\ApplicantEducationController;
use Modules\Applicant\App\Http\Controllers\ApplicantEmergencyContactController;
use Modules\Applicant\App\Http\Controllers\ApplicantExperienceController;
use Modules\Applicant\App\Http\Controllers\ApplicantLanguageSkillController;
use Modules\Applicant\App\Http\Controllers\ApplicantMediaSocialController;
use Modules\Applicant\App\Http\Controllers\ApplicantOrganizationExperienceController;
use Modules\Applicant\App\Http\Controllers\ApplicantRelationReferenceController;
use Modules\Applicant\App\Http\Controllers\ApplicantResumeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('applicant')->group(function () {

    /*===========================
    =           applicantResumes           =
    =============================*/

    Route::apiResource('/applicantResumes', ApplicantResumeController::class)->parameters([
        'applicantResumes' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantResumes',
    ], function () {
        Route::get('{id}/restore', [ApplicantResumeController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantResumeController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantResumeController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantResumeController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantResumeController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantResumeController::class, 'export']);
    });
    /*=====  End of applicantResumes   ======*/

    /*===========================
    =           applicantEducation           =
    =============================*/

    Route::apiResource('/applicantEducation', ApplicantEducationController::class)->parameters([
        'applicantEducation' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantEducation',
    ], function () {
        Route::get('{id}/restore', [ApplicantEducationController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantEducationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantEducationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantEducationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantEducationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantEducationController::class, 'export']);
    });
    /*=====  End of applicantEducation   ======*/

    /*===========================
    =           applicantExperiences           =
    =============================*/

    Route::apiResource('/applicantExperiences', ApplicantExperienceController::class)->parameters([
        'applicantExperiences' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantExperiences',
    ], function () {
        Route::get('{id}/restore', [ApplicantExperienceController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantExperienceController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantExperienceController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantExperienceController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantExperienceController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantExperienceController::class, 'export']);
    });
    /*=====  End of applicantExperiences   ======*/

    /*===========================
    =           applicantLanguageSkills           =
    =============================*/

    Route::apiResource('/applicantLanguageSkills', ApplicantLanguageSkillController::class)->parameters([
        'applicantLanguageSkills' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantLanguageSkills',
    ], function () {
        Route::get('{id}/restore', [ApplicantLanguageSkillController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantLanguageSkillController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantLanguageSkillController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantLanguageSkillController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantLanguageSkillController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantLanguageSkillController::class, 'export']);
    });
    /*=====  End of applicantLanguageSkills   ======*/

    /*===========================
    =           applicantOrganizationExperiences           =
    =============================*/

    Route::apiResource('/applicantOrganizationExperiences', ApplicantOrganizationExperienceController::class)->parameters([
        'applicantOrganizationExperiences' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantOrganizationExperiences',
    ], function () {
        Route::get('{id}/restore', [ApplicantOrganizationExperienceController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantOrganizationExperienceController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantOrganizationExperienceController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantOrganizationExperienceController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantOrganizationExperienceController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantOrganizationExperienceController::class, 'export']);
    });
    /*=====  End of applicantOrganizationExperiences   ======*/

    /*===========================
    =           applicantCertificateOfExpertises           =
    =============================*/

    Route::apiResource('/applicantCertificateOfExpertises', ApplicantCertificateOfExpertiseController::class)->parameters([
        'applicantCertificateOfExpertises' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantCertificateOfExpertises',
    ], function () {
        Route::get('{id}/restore', [ApplicantCertificateOfExpertiseController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantCertificateOfExpertiseController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantCertificateOfExpertiseController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantCertificateOfExpertiseController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantCertificateOfExpertiseController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantCertificateOfExpertiseController::class, 'export']);
    });
    /*=====  End of applicantCertificateOfExpertises   ======*/

    /*===========================
    =           applicantRelationReferences           =
    =============================*/

    Route::apiResource('/applicantRelationReferences', ApplicantRelationReferenceController::class)->parameters([
        'applicantRelationReferences' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantRelationReferences',
    ], function () {
        Route::get('{id}/restore', [ApplicantRelationReferenceController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantRelationReferenceController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantRelationReferenceController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantRelationReferenceController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantRelationReferenceController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantRelationReferenceController::class, 'export']);
    });
    /*=====  End of applicantRelationReferences   ======*/

    /*===========================
    =           applicantMediaSocials           =
    =============================*/

    Route::apiResource('/applicantMediaSocials', ApplicantMediaSocialController::class)->parameters([
        'applicantMediaSocials' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantMediaSocials',
    ], function () {
        Route::get('{id}/restore', [ApplicantMediaSocialController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantMediaSocialController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantMediaSocialController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantMediaSocialController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantMediaSocialController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantMediaSocialController::class, 'export']);
    });
    /*=====  End of applicantMediaSocials   ======*/

    /*===========================
    =           applicantAchievements           =
    =============================*/

    Route::apiResource('/applicantAchievements', ApplicantAchievementController::class)->parameters([
        'applicantAchievements' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantAchievements',
    ], function () {
        Route::get('{id}/restore', [ApplicantAchievementController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantAchievementController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantAchievementController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantAchievementController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantAchievementController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantAchievementController::class, 'export']);
    });
    /*=====  End of applicantAchievements   ======*/

    /*===========================
=           applicantContacts           =
=============================*/

    Route::apiResource('/applicantContacts', ApplicantContactController::class)->parameters([
        'applicantContacts' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantContacts',
    ], function () {
        Route::get('{id}/restore', [ApplicantContactController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantContactController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantContactController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantContactController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantContactController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantContactController::class, 'export']);
    });
    /*=====  End of applicantContacts   ======*/

    /*===========================
    =           applicantEmergencyContacts           =
    =============================*/

    Route::apiResource('/applicantEmergencyContacts', ApplicantEmergencyContactController::class)->parameters([
        'applicantContacts' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantEmergencyContacts',
    ], function () {
        Route::get('{id}/restore', [ApplicantEmergencyContactController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantEmergencyContactController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantEmergencyContactController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantEmergencyContactController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantEmergencyContactController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantEmergencyContactController::class, 'export']);
    });
    /*=====  End of applicantEmergencyContacts   ======*/

    /*===========================
    =           applicantAttachments           =
    =============================*/

    Route::apiResource('/applicantAttachments', ApplicantAttachmentController::class)->parameters([
        'applicantContacts' => 'id'
    ]);

    Route::group([
        'prefix' => 'applicantAttachments',
    ], function () {
        Route::get('{id}/restore', [ApplicantAttachmentController::class, 'restore']);
        Route::delete('{id}/force-delete', [ApplicantAttachmentController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ApplicantAttachmentController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ApplicantAttachmentController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ApplicantAttachmentController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ApplicantAttachmentController::class, 'export']);
    });
    /*=====  End of applicantAttachments   ======*/
});
