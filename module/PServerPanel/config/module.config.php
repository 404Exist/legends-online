<?php

namespace PServerPanel;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Laminas\ServiceManager\Factory\InvokableFactory;
use PServerPanel\Service\VotePostback;
use PServerPanel\View\Helper;
use Laminas\Router\Http;

return [
    'router' => [
        'routes' => [
            'PServerPanel' => [
                'type' => Http\Literal::class,
                'options' => [
                    'route' => '/panel/',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'character' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'character[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\CharacterController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'vote' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'vote[/:action[-:id[/:token]]].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                                'id' => '[0-9]+',
                                'token' => '[a-zA-Z0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\VoteController::class,
                                'action' => 'index',
                                'id' => 0,
                            ],
                        ],
                    ],
                    'vote_postback' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'vote-postback/:provider/:voteId',
                            'constraints' => [
                                'provider' => '[a-z0-9A-Z-]+',
                                'voteId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\VotePostbackController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'maxigame' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'maxigame.html',
                            'defaults' => [
                                'controller' => Controller\MaxigameController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'hipopotamya' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'hipopotamya.html',
                            'defaults' => [
                                'controller' => Controller\HipopotamyaController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'tiklaode' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'tiklaode.html',
                            'defaults' => [
                                'controller' => Controller\TiklaodeController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'resend_register' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'resend-register.html',
                            'defaults' => [
                                'controller' => Controller\ResendRegisterController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'doctrine' => [
        'driver' => [
            'application_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'PServerPanel\Entity' => 'application_entities'
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'p-server-panel/characterPanelNavigation' => __DIR__ . '/../view/helper/characterPanelNavigation.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'getUserAlias' => Helper\UserAlias::class,
        ],
        'factories' => [
            Helper\UserAlias::class => Helper\UserAliasFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'pserverpanel_character_service' => Service\Character::class,
            'pserverpanel_user_alias_service' => Service\UserAlias::class,
            'pserverpanel_vote_service' => Service\Vote::class,
            'pserverpanel_entity_options' => Options\EntityOptions::class,
            'pserverpanel_vote_min_requirement_options' => Options\VoteMinRequirementOptions::class,
        ],
        'factories' => [
            Service\Character::class => Service\CharacterFactory::class,
            Service\UserAlias::class => Service\UserAliasFactory::class,
            Service\Vote::class => Service\VoteFactory::class,
            Service\VotePostback::class => Service\VotePostbackFactory::class,
            Service\Maxigame::class => Service\MaxigameFactory::class,
            Service\Hipopotamya::class => Service\HipopotamyaFactory::class,
            Service\Tiklaode::class => Service\TiklaodeFactory::class,
            Service\ResendRegister::class => Service\ResendRegisterFactory::class,
            Options\EntityOptions::class => Options\EntityOptionsFactory::class,
            Options\VoteMinRequirementOptions::class => Options\VoteMinRequirementOptionsFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CharacterController::class => Controller\CharacterFactory::class,
            Controller\VoteController::class => Controller\VoteFactory::class,
            Controller\HipopotamyaController::class => Controller\HipopotamyaFactory::class,
            Controller\TiklaodeController::class => Controller\TiklaodeControllerFactory::class,
            Controller\MaxigameController::class => Controller\MaxigameFactory::class,
            Controller\VotePostbackController::class => Controller\VotePostbackFactory::class,
            Controller\ResendRegisterController::class => Controller\ResendRegisterFactory::class,
        ],
    ],
    'p-server-panel' => [
        'entity' => [
            'user_alias' => Entity\UserAlias::class,
            'vote_history' => Entity\VoteHistory::class,
            'vote_sites' => Entity\VoteSites::class,
        ],
        'vote' => [
            'min_requirement' => [
                'char_level' => null
            ],
            'postback' => [
                'ip_list' => [
                    VotePostback::PROVIDER_GAMESTOP100 => [
                        '185.176.40.63',
                        '66.70.181.44',
                    ],
                    VotePostback::PROVIDER_XTREMETOP100 => [
                        '199.59.161.214',
                        '2001:41d0:203:49::',
                    ],
                    VotePostback::PROVIDER_GTOP100 => [
                        '198.148.82.98',
                        '198.148.82.99',
                        '2610:150:8019::1:fc02',
                    ],
                    VotePostback::PROVIDER_SILKROAD_SERVER => [
                        '193.70.3.149',
                        '108.162.229',
                        '2a01:4f8:c0c:d97d::1',
                    ],
                    VotePostback::PROVIDER_PRIVATE_SERVER => [
                        '79.137.80.26',
                        '2a01:4f8:c0c:d971::1',
                        '2a01:4f8:c2c:86f::1',
                    ],
                    VotePostback::PROVIDER_TOPG => [
                        '192.99.101.31',
                        '104.24.8.79',
                        '209.59.143.11',
                        '184.154.46.76',
                    ],
                ],
            ],
        ],
    ],
    'pserver' => [
        'donate' => [
            'maxigame' => [
                'url' => 'https://www.maxigame.com/epin/yukle.php',
                'key' => '',
                'secret' => '',
                'package' => [],
            ],
            'hipopotamya' => [
                'url' => 'https://www.hipopotamya.com/api/hipocard/epins',
                'key' => '',
                'secret' => '',
                'package' => [],
            ],
            'tiklaode' => [
                'url' => 'https://tiklaode.com/private/api',
                'key' => '',
                'package' => [],
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            'account' => [
                'id' => 'account',
                'label' => 'Account',
                'uri' => '#',
                'visible' => false,
                'pages' => [
                    'character' => [
                        'label' => 'Character Panel',
                        'route' => 'PServerPanel/character',
                        'resource' => 'PServerPanel/character',
                        'icon' => 'far fa-gem',
                        'id' => 'character_panel',
                        'order' => -100,
                        'pages' => [

                        ],
                    ],
                    'vote4coins' => [
                        'label' => 'Vote4Coins',
                        'route' => 'PServerPanel/vote',
                        'resource' => 'PServerPanel/vote',
                        'icon' => 'fas fa-gamepad',
                        'order' => -10,
                    ],
                    'resend_register' => [
                        'label' => 'Resend Register',
                        'route' => 'PServerPanel/resend_register',
                        'resource' => 'PServerPanel/resend_register',
                        'icon' => 'far fa-paper-plane',
                        'order' => -10,
                    ],
                ],
            ],
        ],
    ],

    'form_elements' => [
        'factories' => [
            Form\Maxigame::class => Form\MaxigameFactory::class,
            Form\Hipopotamya::class => Form\HipopotamyaFactory::class,
            Form\Tiklaode::class => Form\TiklaodeFactory::class,
            Form\ResendRegister::class => Form\ResendRegisterFactory::class,
        ],
    ],
    'input_filters' => [
        'factories' => [
            Form\MaxigameFilter::class => InvokableFactory::class,
            Form\ResendRegisterFilter::class => Form\ResendRegisterFilterFactory::class,
        ],
    ],
];