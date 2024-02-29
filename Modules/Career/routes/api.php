<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'role:applicant'])->prefix('personal')->group(function () {

    Route::get('/check-resume', [\Modules\Career\App\Http\Controllers\PersonalApplicantResumeController::class, 'checkResume']);

    Route::get('/my-resume', [\Modules\Career\App\Http\Controllers\PersonalApplicantResumeController::class, 'myResume']);

    Route::apiResource('resume', \Modules\Career\App\Http\Controllers\PersonalApplicantResumeController::class)->parameters([
        'resume' => 'id'
    ]);

    Route::apiResource('achievements', \Modules\Career\App\Http\Controllers\PersonalApplicantAchievementController::class)->parameters([
        'achievements' => 'id'
    ]);

    Route::apiResource('attachments', \Modules\Career\App\Http\Controllers\PersonalApplicantAttachmentController::class)->parameters([
        'attachments' => 'id'
    ]);

    Route::apiResource('certificateOfExpertises', \Modules\Career\App\Http\Controllers\PersonalApplicantCertificateOfExpertiseController::class)->parameters([
        'certificateOfExpertises' => 'id'
    ]);

    Route::apiResource('contacts', \Modules\Career\App\Http\Controllers\PersonalApplicantContactController::class)->parameters([
        'contacts' => 'id'
    ]);

    Route::apiResource('education', \Modules\Career\App\Http\Controllers\PersonalApplicantEducationController::class)->parameters([
        'education' => 'id'
    ]);

    Route::apiResource('emergencyContact', \Modules\Career\App\Http\Controllers\PersonalApplicantEmergencyContactController::class)->parameters([
        'emergencyContact' => 'id'
    ]);

    Route::apiResource('/experience', \Modules\Career\App\Http\Controllers\PersonalApplicantExperienceController::class)->parameters([
        'experience' => 'id'
    ]);

    Route::apiResource('/languageSkills', \Modules\Career\App\Http\Controllers\PersonalApplicantLanguageSkillController::class)->parameters([
        'languageSkills' => 'id'
    ]);

    Route::apiResource('mediaSocials', \Modules\Career\App\Http\Controllers\PersonalApplicantMediaSocialController::class)->parameters([
        'mediaSocials' => 'id'
    ]);

    Route::apiResource('organizationalExperiences', \Modules\Career\App\Http\Controllers\PersonalApplicantOrganizationExperienceController::class)->parameters([
        'organizationalExperiences' => 'id'
    ]);

    Route::apiResource('projects', Modules\Career\App\Http\Controllers\PersonalProjectController::class)->parameters([
        'projects' => 'id'
    ]);

    Route::apiResource('relationReferences', \Modules\Career\App\Http\Controllers\PersonalApplicantRelationReferenceController::class)->parameters([
        'relationReferences' => 'id'
    ]);
});

Route::prefix('public')->group(function () {
    Route::get('/faqs', [\Modules\Career\App\Http\Controllers\PublicController::class, 'faq']);
    Route::get('/terms', [\Modules\Career\App\Http\Controllers\PublicController::class, 'terms']);
    Route::get('/companyInformation', [\Modules\Career\App\Http\Controllers\PublicController::class, 'companyInformation']);
    Route::get('/recruitment-steps', [\Modules\Career\App\Http\Controllers\PublicController::class, 'recruitmentSteps']);
    Route::get('/privacy-policy', [\Modules\Career\App\Http\Controllers\PublicController::class, 'privacyPolicy']);

    Route::get('/genders', [\Modules\Career\App\Http\Controllers\PublicController::class, 'genders']);
    Route::get('/religions', [\Modules\Career\App\Http\Controllers\PublicController::class, 'religions']);
    Route::get('/levelOfEducations', [\Modules\Career\App\Http\Controllers\PublicController::class, 'levelOfEducations']);
    Route::get('/university', [\Modules\Career\App\Http\Controllers\PublicController::class, 'university']);

    Route::get('/jobVacancy/list', [\Modules\Career\App\Http\Controllers\PublicController::class, 'jobVacancyList'])->name('public.jobVacancy.index');
    Route::get('/jobVacancy/{slug}', [\Modules\Career\App\Http\Controllers\PublicController::class, 'jobVacancyDetail'])->name('public.jobVacancy.show');

    //University
    Route::get('university/get/fromPDDIKTI', [\Modules\Master\App\Http\Controllers\UniversityController::class, 'index']);

    //Study Program
    Route::apiResource('studyProgram', \Modules\Master\App\Http\Controllers\StudyProgramController::class)->only(['index']);
    Route::get('studyProgram/get/fromPDDIKTI', [\Modules\Master\App\Http\Controllers\StudyProgramController::class, 'getFromPDDIKTI']);
});

Route::middleware(['auth:sanctum', 'role:applicant'])->prefix('applicant')->group(function () {


    Route::get('/jobVacancy/list', [\Modules\Career\App\Http\Controllers\PublicController::class, 'jobVacancyList'])->name('career.jobVacancy.index');
    Route::get('/jobVacancy/{slug}', [\Modules\Career\App\Http\Controllers\PublicController::class, 'jobVacancyDetail'])->name('career.jobVacancy.show');
    Route::get('/jobVacancy/closedJob/list', [\Modules\JobVacancy\App\Http\Controllers\JobVacancyController::class, 'listClosedJob']);
});

Route::middleware(['auth:sanctum'])->prefix('master')->group(function () {

    // general upload
    Route::post('upload', [UploadController::class, 'upload']);
    Route::get('user-files', [UploadController::class, 'returnFile']);
    Route::get('download-file', [UploadController::class, 'downloadFile']);
    Route::delete('delete-file', [UploadController::class, 'deleteFile']);
});
