<?php

namespace Modules\Mobile\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Employee\App\Services\Employee\EmployeeService;

class MobileContactController extends Controller
{
    protected $service;

    public function __construct(EmployeeService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $employeeId = auth()->user()->employee->id;
        $request->merge([
            'sorts' => 'full_name',
            'per_page' => 15
        ]);
        $response = $this->service->getContactPaginate();
        return $response->getResult();
    }
}
