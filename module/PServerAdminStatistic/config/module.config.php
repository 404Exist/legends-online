<?php

use PServerAdminStatistic\Controller;
use PServerAdminStatistic\Service;
use Laminas\Router\Http;

return [
    'router' => [
        'routes' => [
            'PServerAdminStatistic' => [
                'type' => Http\Literal::class,
                'options' => [
                    'route' => '/admin/statistic',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'user' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'player' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/player[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\PlayerController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\UserController::class => Controller\UserFactory::class,
            Controller\PlayerController::class => Controller\PlayerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\User::class => Service\UserFactory::class,
            Service\Player::class => Service\PlayerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'PServerAdminStatistic' => __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'pserveradmin' => [
            'admin_statistic' => [
                'label' => 'Statistic',
                'uri' => '#',
                'resource' => 'PServerAdminStatistic/user',
                'pages' => [
                    'register' => [
                        'label' => 'User Register',
                        'route' => 'PServerAdminStatistic/user',
                        'resource' => 'PServerAdminStatistic/user',
                    ],
                    'player_online' => [
                        'label' => 'Player Online',
                        'route' => 'PServerAdminStatistic/player',
                        'resource' => 'PServerAdminStatistic/player',
                    ],
                ],
            ],
        ],
    ],
];