<?php

namespace PServerCMS\RankingMain;

use Laminas\Router\Http;

return [
    'router' => [
        'routes' => [
            'PServerRankingMain' => [
                'type' => Http\Segment::class,
                'options' => [
                    'route' => '/ranking.html',
                    'defaults' => [
                        'controller' => Controller\RankingController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            'ranking' => null,
            'ranking-main' => [
                'label' => 'Ranking',
                'route' => 'PServerRankingMain',
                'resource' => 'PServerRankingMain',
                'order' => -10,
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\RankingController::class => Controller\RankingControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'RankingMain' => __DIR__ . '/../view',
        ],
    ],
    'pserver' => [
        'ranking-main' => [
            'default' => null,
        ],
    ],
];