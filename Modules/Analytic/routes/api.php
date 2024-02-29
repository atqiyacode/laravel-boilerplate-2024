<?php

use Illuminate\Support\Facades\Route;
use Modules\Analytic\App\Http\Controllers\AnalyticController;

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

Route::middleware(['auth:sanctum'])->prefix('analytic')->group(function () {
    Route::get('/religions', [AnalyticController::class, 'getDataReligion']);
    Route::get('/employeeTypes', [AnalyticController::class, 'getDataEmployeeType']);
    Route::get('/fieldOfWorks', [AnalyticController::class, 'getDataFieldOfWork']);
    Route::get('/positions', [AnalyticController::class, 'getDataPosition']);
    Route::get('/workingAreas', [AnalyticController::class, 'getDataWorkingArea']);
    Route::get('/genders', [AnalyticController::class, 'getDataGender']);
});
