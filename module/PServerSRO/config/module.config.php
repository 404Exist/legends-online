<?php

namespace PServerSRO;

use PServerSRO\View\Helper;
use Laminas\Router\Http;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'PServerSRO'  => [
                'type'    => Http\Literal::class,
                'options' => [
                    'route'    => '/sro-tools/',
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'un_stuck' => [
                        'type' => 'Segment',
                        'options' => [
                            'route'    => 'un-stuck.html',
                            'defaults' => [
                                'controller'	=> Controller\UnStuckController::class,
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'player_map' => [
                        'type' => 'Segment',
                        'options' => [
                            'route'    => 'player-map.html',
                            'defaults' => [
                                'controller'	=> Controller\PlayerMapController::class,
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_character' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'admin/character.html',
                            'defaults' => [
                                'controller'	=> Controller\AdminCharacterController::class,
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_smc_log' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'admin/smc-log.html',
                            'defaults' => [
                                'controller'	=> Controller\AdminSMCLogController::class,
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_job_name_history' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'admin/job-name-history.html',
                            'defaults' => [
                                'controller'	=> Controller\AdminJobNameHistoryController::class,
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_log_event_char' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'admin/log-event-char.html',
                            'defaults' => [
                                'controller'	=> Controller\AdminLogEventCharController::class,
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_log_event_item' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'admin/log-event-item.html',
                            'defaults' => [
                                'controller'	=> Controller\AdminLogEventItemController::class,
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                ],
            ],
            'PServerRanking'  => [
                'may_terminate' => true,
                'child_routes'  => [
                    'sro_ranking_job' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'job/:action[-:page].html',
                            'constraints' => [
                                'action'     => '[a-zA-Z-]+',
                                'page'       => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller'	=> Controller\RankingJobController::class,
                                'page'		    => '1',
                            ],
                        ],
                    ],
                    'sro_ranking_honor' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'honor[-:page].html',
                            'constraints' => [
                                'page'       => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller'	=> Controller\HonorRankingController::class,
                                'page'		    => '1',
                                'action'	    => 'index',
                            ],
                        ],
                    ],
                    'sro_alliance' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'alliance[/:action][-:id][/page/:page].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                                'page'   => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller'	=> Controller\AllianceController::class,
                                'page'		    => '1',
                                'action'	    => 'index',
                            ],
                        ],
                    ],
                    'sro_custom_ranking' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'sro/:type[/page/:page].html',
                            'constraints' => [
                                'type' => '[a-zA-Z-0-9]+',
                                'page'   => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller'	=> Controller\CustomRankingController::class,
                                'page'		    => '1',
                                'action'	    => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\AdminCharacterController::class => Controller\AdminCharacterFactory::class,
            Controller\AdminSMCLogController::class => Controller\AdminSMCLogFactory::class,
            Controller\AdminJobNameHistoryController::class => Controller\AdminJobNameHistoryFactory::class,
            Controller\RankingJobController::class => Controller\RankingJobFactory::class,
            Controller\UnStuckController::class => Controller\UnStuckFactory::class,
            Controller\HonorRankingController::class => Controller\HonorRankingFactory::class,
            Controller\AllianceController::class => Controller\AllianceFactory::class,
            Controller\PlayerMapController::class => Controller\PlayerMapFactory::class,
            Controller\AdminLogEventCharController::class => Controller\AdminLogEventCharFactory::class,
            Controller\AdminLogEventItemController::class => Controller\AdminLogEventItemFactory::class,
            Controller\CustomRankingController::class => Controller\CustomRankingFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'pserversro_unstuck_service' => Service\UnStuck::class,
            'pserversro_ranking_job_service' => Service\RankingJob::class,
            'pserversro_admin_smc_log_service' => Service\AdminSMCLog::class,
            'pserversro_admin_character_service' => Service\AdminCharacter::class,
            'pserversro_unstuck_options' => Options\UnStuckPositionOptions::class,
        ],
        'factories' => [
            Service\RankingJob::class => Service\RankingJobFactory::class,
            Service\UnStuck::class => Service\UnStuckFactory::class,
            Service\AdminSMCLog::class => Service\AdminSMCLogFactory::class,
            Service\AdminCharacter::class => Service\AdminCharacterFactory::class,
            Service\AdminJobNameHistory::class => Service\AdminJobNameHistoryFactory::class,
            Service\HonorRanking::class => Service\HonorRankingFactory::class,
            Service\Alliance::class => Service\AllianceFactory::class,
            Service\Character::class => Service\CharacterFactory::class,
            Listener\SitemapAlliance::class => Listener\SitemapAllianceFactory::class,
            Options\UnStuckPositionOptions::class => Options\UnStuckPositionFactory::class,
            Options\Fortress::class => Options\FortressFactory::class,
            Service\CustomRanking::class => Service\CustomRankingFactory::class
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'fortressGuildViewSro' => Helper\Fortress::class,
            'inventoryAvatarViewSro' => Helper\InventoryAvatarView::class,
            'rankingJobTraderViewSro' => Helper\RankingJobTrader::class,
            'rankingJobHunterViewSro' => Helper\RankingJobHunter::class,
            'rankingJobThievesViewSro' => Helper\RankingJobThieves::class,
            'jobType2Name' => Helper\JobTypeToName::class,
            'jobType2Icon' => Helper\JobTypeToIcon::class,
            'charTimedJobBuffs' => Helper\CharTimedJobBuffs::class,
        ],
        'factories' => [
            Helper\Fortress::class => Helper\FortressFactory::class,
            Helper\InventoryAvatarView::class => Helper\InventoryAvatarViewFactory::class,
            Helper\RankingJobTrader::class => Helper\RankingJobTraderFactory::class,
            Helper\RankingJobHunter::class => Helper\RankingJobHunterFactory::class,
            Helper\RankingJobThieves::class => Helper\RankingJobThievesFactory::class,
            Helper\JobTypeToName::class => InvokableFactory::class,
            Helper\JobTypeToIcon::class => InvokableFactory::class,
            Helper\CharTimedJobBuffs::class => Helper\CharTimedJobBuffsFactory::class,
        ],
    ],
    'zfc-sitemap' => [
        'strategies' => [
            Listener\SitemapAlliance::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'p-server-sro/fortress' => __DIR__ . '/../view/helper/fortress.phtml',
            'p-server-sro/ranking-job-hunter' => __DIR__ . '/../view/helper/ranking-job-hunter.phtml',
            'p-server-sro/ranking-job-thieves' => __DIR__ . '/../view/helper/ranking-job-thieves.phtml',
            'p-server-sro/ranking-job-trader' => __DIR__ . '/../view/helper/ranking-job-trader.phtml',
            'p-server-sro/inventory-avatar-view' => __DIR__ . '/../view/helper/inventory-avatar-view.phtml',
            'p-server-sro/char-timed-job-buffs' => __DIR__ . '/../view/helper/char-timed-job-buffs.phtml',
        ],
        'template_path_stack' => [
            'PServerSRO' => __DIR__ . '/../view',
        ],
    ],
    'p-server-sro' => [
        'un_stuck_position' => [
            /** HT position */
            'latest_region' => 23687,
            'world_id' => 1,
            'pos_x' => '1117.602',
            'pos_y' => '244.2866',
            'pos_z' => '136.339',
            'tel_region' => 0,
            'tel_pos_x' => 0,
            'tel_pos_y' => 0,
            'tel_pos_z' => 0,
            'died_region' => 0,
            'died_pos_x' => 0,
            'died_pos_y' => 0,
            'died_pos_z' => 0,
            'tel_world_id' => 1,
            'died_world_id' => 1
        ],
        'fortress' => [
            /**
             * Options\Fortress::MOD_VALID_GUILD => show all entries with a valid-guild
             * Options\Fortress::MOD_ALL_ENTRIES => just show everything
             */
            'mod' => Options\Fortress::MOD_VALID_GUILD,
            /**
             * list of fortress ids, which should be not visible
             */
            'disable' => [],
        ],
        'custom-ranking' => [],
    ],
    'navigation' => [
        'default' => [
            'ranking' => [
                'pages' => [
                    'top_trader' => [
                        'label'  => 'Traders',
                        'route' => 'PServerRanking/sro_ranking_job',
                        'params' => [
                            'action' => 'top-trader',
                        ],
                        'resource' => 'PServerRanking/sro_ranking_job',
                    ],
                    'top_hunter' => [
                        'label'  => 'Hunters',
                        'route' => 'PServerRanking/sro_ranking_job',
                        'params' => [
                            'action' => 'top-hunter',
                        ],
                        'resource' => 'PServerRanking/sro_ranking_job',
                    ],
                    'top_thieves' => [
                        'label'  => 'Thieves',
                        'route' => 'PServerRanking/sro_ranking_job',
                        'params' => [
                            'action' => 'top-thieves',
                        ],
                        'resource' => 'PServerRanking/sro_ranking_job',
                    ],
                    'top_honor' => [
                        'label'  => 'Honors',
                        'route' => 'PServerRanking/sro_ranking_honor',
                        'resource' => 'PServerRanking/sro_ranking_honor',
                    ],
                    'top_alliance' => [
                        'label'  => 'Unions',
                        'route' => 'PServerRanking/sro_alliance',
                        'resource' => 'PServerRanking/sro_alliance',
                    ],
                ],
            ],
            'account' => [
                'pages' => [
                    'character' => [
                        'pages' => [
                            'unstuck' => [
                                'label' => 'UnStuck',
                                'route' => 'PServerSRO/un_stuck',
                                'resource' => 'PServerSRO/un_stuck',
                            ],
                        ],
                    ],
                ],
            ],
            'server-info' => [
                'pages' => [
                    'player_map_position' => [
                        'label' => 'PlayerMap',
                        'route' => 'PServerSRO/player_map',
                        'resource' => 'PServerSRO/player_map',
                    ],
                ],
            ],
        ],
        'pserveradmin' => [
            'admin_user' => [
                'uri' => '#',
                'pages' => [
                    'list' => [
                        'label' => 'UserList',
                        'route' => 'PServerAdmin/user',
                        'resource' => 'PServerAdmin/user',
                    ],
                    'character' => [
                        'label' => 'CharacterList',
                        'route' => 'PServerSRO/admin_character',
                        'resource' => 'PServerSRO/admin_character',
                    ],
                    'job_name_history' => [
                        'label' => 'JobNameHistory',
                        'route' => 'PServerSRO/admin_job_name_history',
                        'resource' => 'PServerSRO/admin_job_name_history',
                    ],
                ],
            ],
            'admin_log' => [
                'pages' => [
                    'PServerSRO\AdminSMCLog' => [
                        'label'  => 'Game',
                        'route' => 'PServerSRO/admin_smc_log',
                        'resource' => 'PServerSRO/admin_smc_log',
                    ],
                    'PServerSRO\AdminLogEventChar' => [
                        'label'  => 'LogEventChar',
                        'route' => 'PServerSRO/admin_log_event_char',
                        'resource' => 'PServerSRO/admin_log_event_char',
                    ],
                    'PServerSRO\AdminLogEventItem' => [
                        'label'  => 'LogEventItem',
                        'route' => 'PServerSRO/admin_log_event_item',
                        'resource' => 'PServerSRO/admin_log_event_item',
                    ],
                ],
            ],
        ],
    ],
    'pserver' => [
        'ranking' => [
            'top_trader' => [
                'label'  => 'Trader',
                'route' => 'PServerRanking/sro_ranking_job',
                'params' => [
                    'action' => 'top-trader',
                ],
            ],
            'top_hunter' => [
                'label'  => 'Hunters',
                'route' => 'PServerRanking/sro_ranking_job',
                'params' => [
                    'action' => 'top-hunter',
                ],
            ],
            'top_thieves' => [
                'label'  => 'Thieves',
                'route' => 'PServerRanking/sro_ranking_job',
                'params' => [
                    'action' => 'top-thieves',
                ],
            ],
            'top_honor' => [
                'label'  => 'Honors',
                'route' => 'PServerRanking/sro_ranking_honor',
            ],
            'top_alliance' => [
                'label'  => 'Alliance',
                'route' => 'PServerRanking/sro_alliance',
            ],
        ],
    ],
];