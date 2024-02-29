<?php

use Illuminate\Http\Request;
use Modules\DynamicForm\App\Http\Controllers\FormController;
use Modules\DynamicForm\App\Http\Controllers\FormFieldController;
use Modules\DynamicForm\App\Http\Controllers\FormPraRegistrationController;
use Modules\DynamicForm\App\Http\Controllers\FormQuestionPraRegistrationController;
use Modules\DynamicForm\App\Http\Controllers\OptionController;
use Modules\DynamicForm\App\Http\Controllers\ResponseController;
use Modules\DynamicForm\App\Http\Controllers\ResponseDataController;
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

Route::middleware(['auth:sanctum'])->prefix('dynamicForm')->group(function () {
    /*===========================
=           formQuestionPraRegistrations           =
=============================*/

    Route::apiResource('/formQuestionPraRegistrations', FormQuestionPraRegistrationController::class)->parameters([
        'formQuestionPraRegistrations' => 'id'
    ]);

    Route::group([
        'prefix' => 'formQuestionPraRegistrations',
    ], function () {
        Route::get('{id}/restore', [FormQuestionPraRegistrationController::class, 'restore']);
        Route::delete('{id}/force-delete', [FormQuestionPraRegistrationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [FormQuestionPraRegistrationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [FormQuestionPraRegistrationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [FormQuestionPraRegistrationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [FormQuestionPraRegistrationController::class, 'export']);
    });
    /*=====  End of formQuestionPraRegistrations   ======*/

    /*===========================
=           formPraRegistrations           =
=============================*/

    Route::apiResource('/formPraRegistrations', FormPraRegistrationController::class)->parameters([
        'formPraRegistrations' => 'id'
    ]);

    Route::group([
        'prefix' => 'formPraRegistrations',
    ], function () {
        Route::get('{id}/restore', [FormPraRegistrationController::class, 'restore']);
        Route::delete('{id}/force-delete', [FormPraRegistrationController::class, 'forceDelete']);
        Route::post('destroy-multiple', [FormPraRegistrationController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [FormPraRegistrationController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [FormPraRegistrationController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [FormPraRegistrationController::class, 'export']);
    });
    /*=====  End of formPraRegistrations   ======*/

    /*===========================
=           forms           =
=============================*/

    Route::apiResource('/forms', FormController::class)->parameters([
        'forms' => 'id'
    ]);

    Route::group([
        'prefix' => 'forms',
    ], function () {
        Route::get('{id}/restore', [FormController::class, 'restore']);
        Route::delete('{id}/force-delete', [FormController::class, 'forceDelete']);
        Route::post('destroy-multiple', [FormController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [FormController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [FormController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [FormController::class, 'export']);
    });
    /*=====  End of forms   ======*/

    /*===========================
=           formFields           =
=============================*/

    Route::apiResource('/formFields', FormFieldController::class)->parameters([
        'formFields' => 'id'
    ]);

    Route::group([
        'prefix' => 'formFields',
    ], function () {
        Route::get('{id}/restore', [FormFieldController::class, 'restore']);
        Route::delete('{id}/force-delete', [FormFieldController::class, 'forceDelete']);
        Route::post('destroy-multiple', [FormFieldController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [FormFieldController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [FormFieldController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [FormFieldController::class, 'export']);
    });
    /*=====  End of formFields   ======*/

    /*===========================
=           responses           =
=============================*/

    Route::apiResource('/responses', ResponseController::class)->parameters([
        'responses' => 'id'
    ]);

    Route::group([
        'prefix' => 'responses',
    ], function () {
        Route::get('{id}/restore', [ResponseController::class, 'restore']);
        Route::delete('{id}/force-delete', [ResponseController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ResponseController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ResponseController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ResponseController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ResponseController::class, 'export']);
    });
    /*=====  End of responses   ======*/

    /*===========================
=           options           =
=============================*/

    Route::apiResource('/options', OptionController::class)->parameters([
        'options' => 'id'
    ]);

    Route::group([
        'prefix' => 'options',
    ], function () {
        Route::get('{id}/restore', [OptionController::class, 'restore']);
        Route::delete('{id}/force-delete', [OptionController::class, 'forceDelete']);
        Route::post('destroy-multiple', [OptionController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [OptionController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [OptionController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [OptionController::class, 'export']);
    });
    /*=====  End of options   ======*/

    /*===========================
=           responseDatas           =
=============================*/

    Route::apiResource('/responseDatas', ResponseDataController::class)->parameters([
        'responseDatas' => 'id'
    ]);

    Route::group([
        'prefix' => 'responseDatas',
    ], function () {
        Route::get('{id}/restore', [ResponseDataController::class, 'restore']);
        Route::delete('{id}/force-delete', [ResponseDataController::class, 'forceDelete']);
        Route::post('destroy-multiple', [ResponseDataController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [ResponseDataController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [ResponseDataController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [ResponseDataController::class, 'export']);
    });
    /*=====  End of responseDatas   ======*/
});
