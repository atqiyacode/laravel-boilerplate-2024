<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\Activity\App\Http\Controllers\ReportEmployeeActivityController;
use Modules\Activity\App\Http\Resources\MonthActivityResource;

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

Route::middleware(['auth:sanctum'])->prefix('activity')->group(function () {
    Route::get('months', function () {
        $activities = DB::table('employee_activities')
            ->select(DB::raw('MONTH(date_of_activity) as month'), DB::raw('YEAR(date_of_activity) as year'), DB::raw('COUNT(*) as activity_count'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        return MonthActivityResource::collection($activities);
    });

    Route::apiResource('/reportEmployeeActivities', ReportEmployeeActivityController::class)->parameters([
        'reportEmployeeActivities' => 'id'
    ]);

    Route::group([
        'prefix' => 'reportEmployeeActivities',
    ], function () {
        Route::get('export/{format}', [ReportEmployeeActivityController::class, 'export']);
    });
});
