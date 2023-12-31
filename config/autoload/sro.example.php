<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                // mssql db @ windows  => GameBackend\DBAL\Driver\PDOSqlsrv\Driver::class,
                // mssql db @ linux  => GameBackend\DBAL\Driver\PDODblib\Driver::class,
                'driverClass' => Doctrine\DBAL\Driver\PDO\MySQL\Driver::class,
                'params' => [
                    'host'     => '127.0.0.1',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => 'barr',
                    'dbname'   => 'pserverCMS',
                ],
            ],
            'orm_sro_account' => [
                // mssql db @ windows  => GameBackend\DBAL\Driver\PDOSqlsrv\Driver::class,
                // mssql db @ linux  => GameBackend\DBAL\Driver\PDODblib\Driver::class,
                //'driverClass' => GameBackend\DBAL\Driver\PDODblib\Driver::class,
                'params' => [
                    'host'     => 'local',
                    'port'     => '1433',
                    'user'     => 'foo',
                    'password' => 'bar',
                    'dbname'   => 'ACCOUNT',
                ],
            ],
            'orm_sro_shard' => [
                // mssql db @ windows  => GameBackend\DBAL\Driver\PDOSqlsrv\Driver::class,
                // mssql db @ linux  => GameBackend\DBAL\Driver\PDODblib\Driver::class,
                //'driverClass' => GameBackend\DBAL\Driver\PDODblib\Driver::class,
                'params' => [
                    'host'     => 'local',
                    'port'     => '1433',
                    'user'     => 'foo',
                    'password' => 'bar',
                    'dbname'   => 'SHARD',
                ],
            ],
            'orm_sro_log' => [
                // mssql db @ windows  => GameBackend\DBAL\Driver\PDOSqlsrv\Driver::class,
                // mssql db @ linux  => GameBackend\DBAL\Driver\PDODblib\Driver::class,
                //'driverClass' => GameBackend\DBAL\Driver\PDODblib\Driver::class,
                'params' => [
                    'host'     => 'local',
                    'port'     => '1433',
                    'user'     => 'foo',
                    'password' => 'bar',
                    'dbname'   => 'LOG',
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'metadata_cache' => 'filesystem',
                'query_cache' => 'filesystem',
                'result_cache' => 'filesystem',
            ],
            'orm_sro_account' => [
                'metadata_cache' => 'filesystem',
                'query_cache' => 'filesystem',
                'result_cache' => 'filesystem',
            ],
            'orm_sro_shard' => [
                'metadata_cache' => 'filesystem',
                'query_cache' => 'filesystem',
                'result_cache' => 'filesystem',
            ],
            'orm_sro_log' => [
                'metadata_cache' => 'filesystem',
                'query_cache' => 'filesystem',
                'result_cache' => 'filesystem',
            ],
        ],
    ],
    'pserver' => [
        'timer' => [
            [
                'name' => 'CTF',
                'hours' => [
                    0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23
                ],
                'min' => 30,
                'icon' => 'fas fa-cubes',
            ],
            [
                'name' => 'Medusa',
                'hours' => [
                    1,22,23
                ],
                'min' => 14,
                'icon' => 'fas fa-crosshairs',
            ],
            //'Sunday' | 'Monday' | 'Tuesday' | 'Wednesday' | 'Thursday' | 'Friday' | 'Saturday'
            [
                'name' => 'Fortress war',
                'days' => [
                    'Wednesday',
                    'Monday',
                ],
                'hour' => 8,
                'min' => 14,
                'icon' => 'fas fa-warehouse',
            ],
            [
                'name' => 'Register',
                'type' => 'static',
                'time' => 'Saturday 12:00 - 23:00',
                'icon' => 'fas fa-hourglass-start',
            ],
        ],
    ],

    'service_manager' => [
        'aliases' => [
            'gamebackend_dataservice' => \GameBackend\DataService\SRO::class,
        ],
    ],
];