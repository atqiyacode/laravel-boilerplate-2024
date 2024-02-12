<?php

return [
    'activated'        => env('USER_ACTIVITY_ACTIVE', true), // active/inactive all logging
    'middleware'       => ['web', 'auth'],
    'route_path'       => env('USER_ACTIVITY_ROUTE', 'admin/user-activity'),
    'admin_panel_path' => 'admin/dashboard',
    'delete_limit'     => env('USER_ACTIVITY_LIMIT', 7), // default 7 days

    'model' => [
        'user' => "App\Models\User"
    ],

    'log_events' => [
        'on_create'     => false,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_lockout'    => true
    ]
];
