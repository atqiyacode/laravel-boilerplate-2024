<?php

namespace Modules\Mobile\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Employee\App\Models\EmployeeAttendance;
use Modules\Employee\App\Services\EmployeeAttendance\EmployeeAttendanceService;

class MobileAttendanceController extends Controller
{
    protected $service;

    public function __construct(EmployeeAttendanceService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $employeeId = auth()->user()->employee->id;
        $request->merge([
            'sorts' => '-check_date',
            'employee_id' => $employeeId
        ]);
        $response = $this->service->getPaginate();
        return $response->getResult();
    }
    public function checkIn(Request $request)
    {
        $checkDate = Carbon::parse($request->check_date);
        $employeeId = auth()->user()->employee->id;
        $request->merge([
            'employee_id' => $employeeId,
            'location_check_in' => json_encode([
                'lat' => $request->latitude_check_in,
                'lng' => $request->longitude_check_in
            ])
        ]);
        $data = EmployeeAttendance::where('check_date', $checkDate)
            ->where('employee_id', $employeeId)
            ->first();

        if (!$data) {
            $data = EmployeeAttendance::create($request->all());
        }

        return $this->respondWithSuccess([
            'message' => trans('alert.success-save'),
            'data' => $data
        ]);
    }

    public function checkOut(Request $request)
    {
        $employeeId = auth()->user()->employee->id;
        $data = EmployeeAttendance::where('check_date', $request->check_date)
            ->where('employee_id', $employeeId)
            ->first();
        if (empty($data)) {
            $data = EmployeeAttendance::create($request->all());
            return $this->respondWithSuccess([
                'message' => trans('alert.success-save'),
                'data' => $data
            ]);
        }
        $data->check_out = $request->check_out;
        $data->photo_check_out = $request->photo_check_out;
        $data->location_check_out = json_encode([
            'lat' => $request->latitude_check_out,
            'lng' => $request->longitude_check_out
        ]);
        $data->update();
        return $this->respondWithSuccess([
            'message' => trans('alert.success-update'),
            'data' => $data
        ]);
    }
}
