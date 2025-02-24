<?php

return [
    'default' => env('LOG_CHANNEL', 'stack'),

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path(path: 'logs/lumen.log'),
            'level' => 'debug',
        ],

        'production' => [
            'driver' => 'single',
            'path' => storage_path(path: 'logs/production.log'),
            'level' => 'info',
        ],

        'staging' => [
            'driver' => 'single',
            'path' => storage_path(path: 'logs/staging.log'),
            'level' => 'info',
        ],

        'test' => [
            'driver' => 'single',
            'path' => storage_path(path: 'logs/test.log'),
            'level' => 'info',
        ],

        'custom' => [
            'driver' => 'daily',
            'path' => storage_path(path: 'logs/custom.log'),
            'level' => 'debug',
            'days' => 7,
        ],
    ],
];
