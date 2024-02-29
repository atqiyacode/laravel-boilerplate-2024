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

Route::middleware(['auth:sanctum'])->prefix('project')->group(function () {
    /*===========================
    =           projects           =
    =============================*/

    Route::apiResource('/projects', \Modules\Project\App\Http\Controllers\ProjectController::class)->parameters([
        'projects' => 'id'
    ]);

    Route::group([
        'prefix' => 'projects',
    ], function () {
        Route::get('{id}/restore', [\Modules\Project\App\Http\Controllers\ProjectController::class, 'restore']);
        Route::delete('{id}/force-delete', [\Modules\Project\App\Http\Controllers\ProjectController::class, 'forceDelete']);
        Route::post('destroy-multiple', [\Modules\Project\App\Http\Controllers\ProjectController::class, 'destroyMultiple']);
        Route::post('restore-multiple', [\Modules\Project\App\Http\Controllers\ProjectController::class, 'restoreMultiple']);
        Route::post('force-delete-multiple', [\Modules\Project\App\Http\Controllers\ProjectController::class, 'forceDeleteMultiple']);
        Route::get('export/{format}', [\Modules\Project\App\Http\Controllers\ProjectController::class, 'export']);
    });
    /*=====  End of projects   ======*/
});
