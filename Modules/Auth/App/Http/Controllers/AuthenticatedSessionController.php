<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Modules\Auth\App\Http\Requests\LoginRequest;
use Modules\User\App\Http\Resources\User\CurrentUserResource;
use Modules\User\App\Models\UserVerificationCode;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        if (config('atqiyacode.bypass_verification')) {
            $user = auth()->user();
            if (!(bool) $user->email_verified_at) {
                $user->email_verified_at = now();
                $user->update();
            }
            return $this->doLogin();
        } else {

            $defaultResponse = [
                'status' => trans('alert.success'),
                'message' => trans('auth.success.2fa-text-login'),
                'email'   => $request->email,
                'password'   => $request->password,
                'is_verified' => (bool) auth()->user()->email_verified_at,

                // 'hasPhone'   => (bool) auth()->user()->phone,
                // 'hasPin'   => (bool) auth()->user()->pin,
                // 'hasDevice'   => (bool) auth()->user()->firebaseToken,
                'hasEmail' => (bool) auth()->user()->email
            ];
        }


        return $this->respondWithSuccess($defaultResponse);
    }

    public function verify(LoginRequest $request)
    {
        $request->authenticate();
        $verification = UserVerificationCode::where('user_id', auth()->user()->id)
            ->where('token_code', $request->code)
            ->where('expired_at', '>=', now())
            ->first();

        if (!$verification) {
            return response()->json([
                'title' => trans('auth.wrong_verification_code'),
                'message' => trans('auth.wrong_verification_code'),
                'errors' => [
                    'code' => [trans('auth.wrong_verification_code')]
                ],
            ], 422);
        }

        return $this->doLogin();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete(); // sanctum
        // auth()->user()->token()->revoke(); // passport
        $cookie = Cookie::forget(config('atqiyacode.token_cookie'));
        return response()->json([
            'message' => trans('alert.success-logout')
        ])->withCookie($cookie);
    }

    public function doLogin()
    {
        $user = auth()->user();

        $tokenData = $user->createToken('access-token');

        $cacheKey = 'user_' . auth()->user()->id . '_login_history';

        Cache::forget($cacheKey);

        // $token = $tokenData->accessToken; // passport token
        $token = $tokenData->plainTextToken; // sanctum token
        $cookie = $this->getCookieDetails($token);
        return response()
            ->json(new CurrentUserResource($user), 200)
            ->cookie($cookie['name'], $cookie['value'], $cookie['minutes'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly'], $cookie['samesite']);
    }

    private function getCookieDetails($token)
    {
        return [
            'name' => config('atqiyacode.token_cookie'),
            'value' => $token,
            'minutes' => now()->diffInMinutes(now()->addMonth()),
            'path' => null,
            'domain' => null,
            'secure' => app()->isProduction() ? true : null,
            'httponly' => true,
            'samesite' => 'None',
        ];
    }
}
