<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Auth\App\Http\Requests\GenerateTokenCodeRequest;
use Modules\Auth\App\Jobs\SendEmailLoginNotificationJob;
use Modules\Auth\App\Jobs\SendWhatsappLoginNotificationJob;
use Modules\User\App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Browser;
use Exception;
use Modules\Master\App\Models\VerificationCodeType;
use Modules\User\App\Models\UserVerificationCode;

class GenerateTokenCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GenerateTokenCodeRequest $request)
    {
        $user = User::withTrashed()->where('email', $request->email)
            ->firstOrFail();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'title' => trans('auth.password'),
                'message' => trans('auth.password'),
                'errors' => [
                    'password' => [trans('auth.password')],
                ],
            ], 422);
        }

        if ($user->deleted_at) {
            return response()->json([
                'title' => trans('auth.deleted_user'),
                'message' => trans('auth.deleted_user'),
                'errors' => [
                    'email' => [trans('auth.deleted_user')]
                ],
            ]);
        }

        $code = config('app.random_otp') ? rand(100000, 999999) : '111111';

        $expired_at = now()->addMinutes(config('app.expired_otp'));

        DB::transaction(function () use ($request, $user, $code, $expired_at) {
            $latestCode = UserVerificationCode::where('user_id', $user->id)->latest()->first();
            if ($latestCode) {
                $latestCode->update([
                    'expired_at' => now(),
                ]);
            }
            $verification_code_type = VerificationCodeType::whereName('login')->firstOrFail();
            $request->merge([
                'user_id' => $user->id,
                'token_code' => $code,
                'expired_at' => $expired_at,
                'verification_code_type_id' => $verification_code_type->id,
            ]);
            UserVerificationCode::create($request->all());
        });

        if ($request->has('method')) {
            if ($request->method === 'whatsapp' && $user->phone != null) {
                return $this->pushWhatsappLoginNotification($user, $code, $expired_at);
            }
            if ($request->method === 'email') {
                return $this->pushEmailLoginNotification($user, $code);
            }
            if ($request->method === 'device') {
                return $this->pushDeviceLoginNotification($user, $code, $expired_at);
            }
        }
    }


    public function pushEmailLoginNotification($user, $code)
    {
        try {
            $data = [
                'email' => $user->email,
                'subject' => trans('lang.login') . ' - ' . config('app.name'),
                'title' => trans('lang.login'),
                'code' => $code,
                'user' => $user,
                'message' => trans('lang.login-message'),
                'note' => trans('lang.login-note'),
            ];
            dispatch(new SendEmailLoginNotificationJob($data));
            return $this->respondWithSuccess([
                'message' => trans('alert.success-send-otp-email')
            ]);
        } catch (Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }

    public function pushWhatsappLoginNotification($user, $code, $expired_at)
    {
        $dataWhatsapp = [
            'phone' =>  $user->phone,
            'code' =>  $code,
        ];
        dispatch(new SendWhatsappLoginNotificationJob($dataWhatsapp));

        return $this->respondWithSuccess([
            'message' => trans('alert.success-send-otp-whatsapp')
        ]);
    }
}
