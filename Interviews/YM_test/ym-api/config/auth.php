<?php

use App\Models\User;

return [
    'defaults' => [
        'guard' => 'jwtapi',
        'passwords' => 'users',
    ],

    'guards' => [
        'jwtapi' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => User::class
        ]
    ]
];
