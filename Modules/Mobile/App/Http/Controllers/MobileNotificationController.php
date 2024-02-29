<?php

namespace Modules\Mobile\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\App\Services\UserNotification\UserNotificationService;
use Illuminate\Http\Request;

class MobileNotificationController extends Controller
{
    protected $service;

    public function __construct(UserNotificationService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
            'sorts' => '-created_at',
            'per_page' => 20,
        ]);
        $response = $this->service->getPaginateMobile();
        return $response->getResult();
    }

    public function show($id)
    {
        request()->merge(['user_id' => auth()->user()->id]);
        return $this->service->findByIdMobile($id)->toJson();
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
        ]);
        $query = $this->service->update($id, $request->all());
        return $query->toJson();
    }

    public function destroy($id)
    {
        request()->merge([
            'user_id' => auth()->user()->id,
        ]);
        $query = $this->service->delete($id);
        return $query->toJson();
    }
}
