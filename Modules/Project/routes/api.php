<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Project\App\Http\Controllers\API\HR\ProjectController;

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
});
