<?php

namespace PServerCLI;

return [
    'controllers' => [
        'factories' => [
            Controller\PlayerHistoryController::class => Controller\PlayerHistoryFactory::class,
            Controller\CodeCleanUpController::class => Controller\CodeCleanUpFactory::class,
            Controller\OnlineCheckerController::class => Controller\OnlineCheckerFactory::class,
            Controller\UserRewardController::class => Controller\UserRewardFactory::class,
        ],
    ],
    'console' => [
        'router' => [
            'routes' => [
                'player-history' => [
                    'options' => [
                        'route' => 'player-history [<player>]',
                        'defaults' => [
                            'controller' => Controller\PlayerHistoryController::class,
                            'action' => 'index'
                        ],
                    ],
                ],
                'user-codes-cleanup' => [
                    'options' => [
                        'route' => 'user-codes-cleanup [<limit>]',
                        'defaults' => [
                            'controller' => Controller\CodeCleanUpController::class,
                            'action' => 'index'
                        ],
                    ],
                ],
                'online-checker' => [
                    'options' => [
                        'route' => 'online-checker',
                        'defaults' => [
                            'controller' => Controller\OnlineCheckerController::class,
                            'action' => 'index'
                        ],
                    ],
                ],
                'user-reward' => [
                    'options' => [
                        'route' => 'user-reward [<player>] [<coins>]',
                        'defaults' => [
                            'controller' => Controller\UserRewardController::class,
                            'action' => 'index'
                        ],
                    ],
                ],
            ],
        ],
    ],
    'pserver' => [
        'online-checker' => [],
    ],
];