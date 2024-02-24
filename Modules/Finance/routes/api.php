<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Finance\App\Http\Controllers\PaymentPlanController;

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

Route::middleware(['force:json', 'multilang', 'auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::apiResource('/paymentPlans', PaymentPlanController::class)->parameters([
        'paymentPlans' => 'id'
    ]);

    Route::group([
        'prefix' => 'paymentPlans',
    ], function () {
        Route::get('{id}/restore', [PaymentPlanController::class, 'restore']);
        Route::delete('{id}/force-delete', [PaymentPlanController::class, 'forceDelete']);
        Route::post('destroy-multiple', [PaymentPlanController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [PaymentPlanController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [PaymentPlanController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [PaymentPlanController::class, 'export']);
    });
});
