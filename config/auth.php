<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'registers',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'registers',
            'hash' => false,
        ],
    ],

    'providers' => [
        'registers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Register::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'registers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
