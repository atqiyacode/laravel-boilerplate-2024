<?php

namespace Modules\Mobile\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Employee\App\Services\Employee\EmployeeService;
use Modules\User\App\Services\User\UserService;
use Modules\Developer\App\Services\UserLogActivity\UserLogActivityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    protected $employeeService, $userLogActivityService, $userService;

    public function __construct(UserService $userService, UserLogActivityService $userLogActivityService, EmployeeService $employeeService)
    {
        $this->userService = $userService;
        $this->userLogActivityService = $userLogActivityService;
        $this->employeeService = $employeeService;
    }
    public function profile()
    {
        $nik = auth()->user()->username;
        return $this->employeeService->findByNik($nik)->toJson();
    }

    public function loginHistory()
    {
        request()->merge([
            'sorts' => '-log_date',
            'user_id' => auth()->user()->id,
            'log_type' => 'login',
            'per_page' => 15
        ]);

        $result = $this->userLogActivityService->getPaginateMobile()->getResult();
        return $result;
    }

    public function deleteLoginHistory(Request $request)
    {
        $query = $this->userLogActivityService->destroyMultipleLoginHistory($request->ids);
        return $query->toJson();
    }
}
