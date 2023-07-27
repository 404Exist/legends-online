<?php

use PServerCMS\DonateAction\Controller;
use PServerCMS\DonateAction\Option;
use PServerCMS\DonateAction\View\Helper;
use PServerCMS\DonateAction\Service;
use PServerCore\Service as CoreService;
use Laminas\Router\Http;

return [
    'router' => [
        'routes' => [
            'PServerCMSDonateAction' => [
                'type' => Http\Literal::class,
                'options' => [
                    'route' => '/donate-action/',
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'stats' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'stats[/:action].html',
                            'constraints' => [
                                'action'     => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller'	=> Controller\StatsController::class,
                                'action'        => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\StatsController::class => Controller\StatsFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            // we have to overwrite the core service
            CoreService\PaymentNotifyCoins::class => Service\PaymentNotifyCoinsFactory::class,
            Option\DonateLevelList::class => Option\DonateLevelListFactory::class,
            Option\DailyCashCounter::class => Option\DailyCashCounterFactory::class,
            Option\MonthlyCashCounter::class => Option\MonthlyCashCounterFactory::class,
            Service\PaymentNotifyCoins::class => Service\PaymentNotifyCoinsFactory::class,
            Service\DonateLevel::class => Service\DonateLevelFactory::class,
            Service\DailyCashCounter::class => Service\DailyCashCounterFactory::class,
            Service\MonthlyCashCounter::class => Service\MonthlyCashCounterFactory::class,
            Service\DonateBonus::class => Service\DonateBonusFactory::class,
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'dailyCashCounterWidget' => Helper\DailyCashCounter::class,
            'monthlyCashCounterWidget' => Helper\MonthlyCashCounter::class,
            'donateBonusWidget' => Helper\DonateBonus::class,
        ],
        'factories' => [
            Helper\DailyCashCounter::class => Helper\DailyCashCounterFactory::class,
            Helper\MonthlyCashCounter::class => Helper\MonthlyCashCounterFactory::class,
            Helper\DonateBonus::class => Helper\DonateBonusFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'helper/daily-cash-counter-widget' => __DIR__ . '/../view/p-server-cms/cash-counter/helper.phtml',
            'helper/monthly-cash-counter-widget' => __DIR__ . '/../view/p-server-cms/cash-counter/helper.phtml',
            'helper/donate-bonus-widget' => __DIR__ . '/../view/p-server-cms/cash-counter/donate-bonus.phtml',
        ],
        'template_path_stack' => [
            'PServerCMSDonateAction' => __DIR__ . '/../view',
        ],
    ],
    'p-server-donate-action' => [
        'donate-level' => [
            /**
             *  Example how your config can look
            [
                'name' => 'Level 1',
                'amount' => 1000,
                'percent' => 10,
            ],
            [
                'name' => 'Level 2',
                'amount' => 2000,
                'percent' => 10,
            ],
             */
        ],
        'daily-cash-counter' => [
            'enable' => false,
            'amount' => 0,
            'percent' => 0.
        ],
        'monthly-cash-counter' => [
            'enable' => false,
            'amount' => 0,
            'percent' => 0.
        ],
        'donate-bonus' => [
            /** example
            [
                'from' => time() - 60,
                'to' => time() + 60,
                'percent' => 10,
            ]
             */
        ],
    ],
    'navigation' => [
        'default' => [
            'account' => [
                'pages' => [
                    'donate_stats' => [
                        'label' => 'Donate Stats',
                        'route' => 'PServerCMSDonateAction/stats',
                        'icon' => 'fa fa-bolt',
                        'resource' => 'PServerCMSDonateAction/stats',
                    ],
                ],
            ],
        ],
    ],
];