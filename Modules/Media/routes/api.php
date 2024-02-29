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

Route::middleware(['auth:sanctum'])->prefix('media')->group(function () {
    Route::post('upload', [\Modules\Media\App\Http\Controllers\UploadController::class, 'upload']);
    Route::get('user-files', [\Modules\Media\App\Http\Controllers\UploadController::class, 'returnFile']);
    Route::get('download-file', [\Modules\Media\App\Http\Controllers\UploadController::class, 'downloadFile']);
    Route::delete('delete-file', [\Modules\Media\App\Http\Controllers\UploadController::class, 'deleteFile']);
});
