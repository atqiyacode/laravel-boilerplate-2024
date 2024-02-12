<?php

return [

    'whatsapp_host' => env('WHATSAPP_HOST', null),

    'whatsapp_key' => env('WHATSAPP_KEY', null),

    'whatsapp_test_number' => env('WHATSAPP_TEST_NUMBER', null),

    'expired_otp' => env('EXPIRED_OTP', 5),

    'cache_time' => env('CACHE_TIME', 300),

    'random_otp' => env('RANDOM_OTP', true),

    'bypass_verification' => env('BYPASS_VERIFICATION', false),

    'api_version' => env('API_VERSION', 'v1'),

    'disable_cors' => env('DISABLE_CORS', false),

    'logo_email' => env('LOGO_EMAIL', ''),

    'fcm_image' => env('FCM_IMAGE', ''),

    'fcm_icon' => env('FCM_ICON', ''),

    'token_cookie' => str_replace(['_', ' ', '/'], '-', env('TOKEN_COOKIE', 'ATQIYACODE')),

];
