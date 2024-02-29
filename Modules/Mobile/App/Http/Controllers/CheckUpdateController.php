<?php

namespace Modules\Mobile\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\MobileApp\App\Models\MobileServer;

class CheckUpdateController extends Controller
{
    public function mobileAppServerStatus()
    {
        $mobileAppServerStatus = MobileServer::firstOrFail();
        return $this->respondWithSuccess([
            'is_maintenance' => $mobileAppServerStatus->status === 'online' ? false : true,
            'msg' => $mobileAppServerStatus->status === 'online' ? 'online' : [
                'title' => trans('alert.app_maintenance'),
                'message' => trans('alert.app_maintenance_message'),
            ],
        ]);
    }
}
