<?php

use PServerCMS\SROUnique\Option;
use PServerCMS\SROUnique\Controller;
use PServerCMS\SROUnique\Shard;
use PServerCMS\SROUnique\Service;
use PServerCMS\SROUnique\View\Helper;
use Laminas\Router\Http;

return [
    'router' => [
        'routes' => [
            'PServerRanking'  => [
                'may_terminate' => true,
                'child_routes'  => [
                    'sro_ranking_unique' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route'    => 'unique/:action[-:page].html',
                            'constraints' => [
                                'action'     => '[a-zA-Z-]+',
                                'page'       => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller'	=> Controller\RankingUniqueController::class,
                                'page'		    => '1',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\RankingUniqueController::class => Controller\RankingUniqueFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\UniqueKillList::class => Service\UniqueKillListFactory::class,
            Option\SROShardEntity::class => Option\SROShardEntityFactory::class,
        ],
    ],
    'doctrine' => [
        'driver' => [
            'sro_shard_entities' => [
                'paths' => [__DIR__ . '/../src/Shard/Entity']
            ],
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'uniqueKillListPServerSROUnique' => Helper\UniqueKillList::class,
            'characterEachUniquePointsPServerSROUnique' => Helper\CharacterEachUniquePoints::class,
            'uniqueKillHistoryCharacterPServerSROUnique' => Helper\KillHistoryCharacter::class,
        ],
        'factories' => [
            Helper\CharacterEachUniquePoints::class => Helper\CharacterEachUniquePointsFactory::class,
            Helper\UniqueKillList::class => Helper\UniqueKillListFactory::class,
            Helper\KillHistoryCharacter::class => Helper\KillHistoryCharacterFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'p-server-sro-unique/unique-kill-list' => __DIR__ . '/../view/helper/unique-kill-list.phtml',
            'p-server-sro-unique/killhistory-character' => __DIR__ . '/../view/helper/killhistory-character.phtml',
            'p-server-sro-unique/character-each-unique-points' => __DIR__ . '/../view/helper/character-each-unique-points.phtml',
        ],
        'template_path_stack' => [
            'PServerSROUnique' => __DIR__ . '/../view',
        ],
    ],
    'p-server-sro-unique' => [
        'sro' => [
            'entity' => [
                'shard' => [
                    'unique_info' => Shard\Entity\UniqueInfo::class,
                    'unique_kill_list' => Shard\Entity\UniqueKillList::class,
                    'unique_ranking' => Shard\Entity\UniqueRanking::class,
                ],
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            'ranking' => [
                'pages' => [
                    'top_unique' => [
                        'label'  => 'Top Unique',
                        'route' => 'PServerRanking/sro_ranking_unique',
                        'params' => [
                            'action' => 'top-unique',
                        ],
                        'resource' => 'PServerRanking/sro_ranking_unique',
                    ],
                ],
            ],
        ],
    ],
    'pserver' => [
        'ranking' => [
            'top_unique' => [
                'label'  => 'Top Unique',
                'route' => 'PServerRanking/sro_ranking_unique',
                'params' => [
                    'action' => 'top-unique',
                ],
            ],
        ],
    ],
];