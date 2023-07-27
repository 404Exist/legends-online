<?php

use Laminas\Session;

return [
    'zfc-ticket-system' => [
        'auth_service' => 'small_user_auth_service'
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
    ],
    'session_config' => [
        'remember_me_seconds' => 60*60*24,
        'gc_maxlifetime' => 60*60*24,
        //'cookie_secure' => true,
        //'cookie_httponly' => true,
        //'cookie_samesite' => 'Strict',
    ],
    'session_manager' => [
        'validators' => [
            Session\Validator\RemoteAddr::class,
            Session\Validator\HttpUserAgent::class,
        ]
    ],
    'session_storage' => [
        'type' => Session\Storage\SessionArrayStorage::class,
    ],
];
