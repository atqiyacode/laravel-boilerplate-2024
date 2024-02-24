<?php

use Modules\Others\App\Http\Controllers\FAQController;
use Modules\Others\App\Http\Controllers\PrivacyPolicyController;
use Modules\Others\App\Http\Controllers\TermAndConditionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->prefix('others')->group(function () {
    /*===========================
    =           fAQS           =
    =============================*/

    Route::apiResource('/faqs', FAQController::class)->parameters([
        'faqs' => 'id'
    ]);

    Route::group([
        'prefix' => 'faqs',
    ], function () {
        Route::get('{id}/restore', [FAQController::class, 'restore']);
        Route::delete('{id}/force-delete', [FAQController::class, 'forceDelete']);
        Route::post('destroy-multiple', [FAQController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [FAQController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [FAQController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [FAQController::class, 'export']);
    });
    /*=====  End of fAQS   ======*/

    /*===========================
    =           termAndConditions           =
    =============================*/

    Route::apiResource('/termAndConditions', TermAndConditionController::class)->parameters([
        'termAndConditions' => 'id'
    ])->only('index', 'update');

    /*=====  End of termAndConditions   ======*/

    /*===========================
    =           privacyPolicies           =
    =============================*/

    Route::apiResource('/privacyPolicies', PrivacyPolicyController::class)->parameters([
        'privacyPolicies' => 'id'
    ])->only('index', 'update');
    /*=====  End of privacyPolicies   ======*/
});
