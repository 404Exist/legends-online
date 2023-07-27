<?php

namespace PServerCMS\SROKill;

use PServerCMS\SROKill\View\Helper;
use Laminas\Router\Http;

return [
    'router' => [
        'routes' => [
            'PServerRanking'  => [
                'may_terminate' => true,
                'child_routes'  => [
                    'sro_ranking_kill' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'kill-counter/:action[-:page].html',
                            'constraints' => [
                                'action'     => '[a-zA-Z-]+',
                                'page'       => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller'	=> Controller\RankingKillCounterController::class,
                                'page'		    => '1',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'pserverSROPvpKillHistory' => Helper\PvpKillHistory::class,
            'pserverSROJobKillHistory' => Helper\JobKillHistory::class,
            'pserverSROPvpKillHistoryWidget' => Helper\PvpKillHistoryWidget::class,
            'pserverSROJobKillHistoryWidget' => Helper\JobKillHistoryWidget::class,
            'pserverSROKillDeath' => Helper\KillDeathCounter::class,
        ],
        'factories' => [
            Helper\PvpKillHistory::class => Helper\KillHistoryFactory::class,
            Helper\JobKillHistory::class => Helper\KillHistoryFactory::class,
            Helper\PvpKillHistoryWidget::class => Helper\KillHistoryFactory::class,
            Helper\JobKillHistoryWidget::class => Helper\KillHistoryFactory::class,
            Helper\KillDeathCounter::class => Helper\KillHistoryFactory::class
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\RankingKillCounterController::class => Controller\RankingKillCounterFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\KillCounter::class => Service\KillCounterFactory::class,
        ],
    ],
    'navigation' => [
        'default' => [
            'ranking' => [
                'pages' => [
                    'sro_kill_pvp' => [
                        'label'  => 'Top PVP KD',
                        'route' => 'PServerRanking/sro_ranking_kill',
                        'params' => [
                            'action' => 'top-pvp',
                        ],
                        'resource' => 'PServerRanking/sro_ranking_kill',
                    ],
                    'sro_kill_job' => [
                        'label'  => 'Top JOB KD',
                        'route' => 'PServerRanking/sro_ranking_kill',
                        'params' => [
                            'action' => 'top-job',
                        ],
                        'resource' => 'PServerRanking/sro_ranking_kill',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'helper/pserverSROPvpKillHistory' => __DIR__ . '/../view/helper/pvp-kill-history.phtml',
            'helper/pserverSROJobKillHistory' => __DIR__ . '/../view/helper/job-kill-history.phtml',
            'helper/pserverSROPvpKillHistoryWidget' => __DIR__ . '/../view/helper/pvp-kill-history-widget.phtml',
            'helper/pserverSROJobKillHistoryWidget' => __DIR__ . '/../view/helper/job-kill-history-widget.phtml',
            'helper/pserverSROKillDeath' => __DIR__ . '/../view/helper/kill-death.phtml',
        ],
        'template_path_stack' => [
            'PServerSROKill' => __DIR__ . '/../view',
        ],
    ],
    'pserver' => [
        'ranking' => [
            'sro_kill_pvp' => [
                'label'  => 'Top PVP KD',
                'route' => 'PServerRanking/sro_ranking_kill',
                'params' => [
                    'action' => 'top-pvp',
                ],
            ],
            'sro_kill_job' => [
                'label'  => 'Top JOB KD',
                'route' => 'PServerRanking/sro_ranking_kill',
                'params' => [
                    'action' => 'top-job',
                ],
            ],
        ],
    ],
];