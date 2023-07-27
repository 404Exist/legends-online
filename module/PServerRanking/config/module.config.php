<?php

namespace PServerRanking;

use PServerRanking\View\Helper;
use Laminas\Router\Http;
use Laminas\ServiceManager\Factory\InvokableFactory;

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
            'PServerRanking' => [
                'type' => Http\Literal::class,
                'options' => [
                    'route' => '/ranking/',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'ranking' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => ':action[-:page].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                                'page' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\RankingController::class,
                                'page' => '1',
                            ],
                        ],
                    ],
                    'character' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'character[/:action][-:id].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\CharacterController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'guild' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'guild[/:action][-:id][/page/:page].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\GuildController::class,
                                'action' => 'detail',
                            ],
                        ],
                    ],
                    'search' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'search[/page/:page].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\SearchController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'helper/pServerRankingItemDetails' => __DIR__ . '/../view/helper/item-details.phtml',
            'helper/pServerRankingInventoryView' => __DIR__ . '/../view/helper/inventory-view.phtml',
            'helper/pServerRankingSearchCharacter' => __DIR__ . '/../view/helper/search-character.phtml',
            'helper/FormSearchCharacterWidget' => __DIR__ . '/../view/helper/form-search-character.phtml',
            'helper/topCharacterWidget' => __DIR__ . '/../view/helper/top-character.phtml',
            'helper/topGuildWidget' => __DIR__ . '/../view/helper/top-guild.phtml',
            'helper/additionalCharacterDetails' => __DIR__ . '/../view/helper/additional-character-details.phtml',
        ],
        'template_path_stack' => [
            'PServerRanking' => __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'pServerRankingItemDetails' => Helper\ItemDetails::class,
            'pServerRankingInventoryView' => Helper\InventoryView::class,
            'pServerRankingSearchCharacter' => Helper\SearchCharacter::class,
            'pServerRankingTopCharacterWidget' => Helper\TopCharacterWidget::class,
            'pServerRankingTopGuildWidget' => Helper\TopGuildWidget::class,
            'pServerRankingAdditionalCharacterDetails' => Helper\AdditionalCharacterDetails::class,
        ],
        'factories' => [
            Helper\ItemDetails::class => InvokableFactory::class,
            Helper\InventoryView::class => InvokableFactory::class,
            Helper\SearchCharacter::class => Helper\SearchCharacterFactory::class,
            Helper\TopCharacterWidget::class => Helper\TopCharacterFactory::class,
            Helper\TopGuildWidget::class => Helper\TopGuildFactory::class,
            Helper\AdditionalCharacterDetails::class => InvokableFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'pserverranking_ranking_service' => Service\Ranking::class,
            'pserverranking_character_service' => Service\Character::class,
            'pserverranking_guild_service' => Service\Guild::class,
        ],
        'factories' => [
            Service\Ranking::class => Service\RankingFactory::class,
            Service\Character::class => Service\CharacterFactory::class,
            Service\Guild::class => Service\GuildFactory::class,
            Service\GameSearch::class => Service\GameSearchFactory::class,
            Form\GameSearch::class => Form\GameSearchFactory::class,
            Listener\SitemapCharacter::class => Listener\SitemapCharacterFactory::class,
            Listener\SitemapGuild::class => Listener\SitemapGuildFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\RankingController::class => Controller\RankingFactory::class,
            Controller\CharacterController::class => Controller\CharacterFactory::class,
            Controller\GuildController::class => Controller\GuildFactory::class,
            Controller\SearchController::class => Controller\SearchFactory::class,
        ],
    ],
    'zfc-sitemap' => [
        'strategies' => [
            Listener\SitemapCharacter::class,
            Listener\SitemapGuild::class,
        ],
    ],
    'navigation' => [
        'default' => [
            'ranking' => [
                'label' => 'Ranking',
                'uri' => '#',
                'resource' => 'PServerRanking/ranking',
                'order' => -10,
                'pages' => [
                    'top_player' => [
                        'label' => 'Players',
                        'route' => 'PServerRanking/ranking',
                        'params' => [
                            'action' => 'top-player',
                        ],
                        'resource' => 'PServerRanking/ranking',
                    ],
                    'top_guild' => [
                        'label' => 'Guilds',
                        'route' => 'PServerRanking/ranking',
                        'params' => [
                            'action' => 'top-guild',
                        ],
                        'resource' => 'PServerRanking/ranking',
                    ],
                    'search' => [
                        'label' => 'Search',
                        'route' => 'PServerRanking/search',
                        'resource' => 'PServerRanking/search',
                        'visible' => false,
                    ],
                    'character' => [
                        'label' => 'Character',
                        'route' => 'PServerRanking/character',
                        'uri' => '#',
                        'visible' => false,
                        'pages' => [
                            'detail' => [
                                'label' => 'Detail',
                                'route' => 'PServerRanking/character',
                                'params' => [
                                    'action' => 'index',
                                ],
                            ],
                        ],
                    ],
                    'guild' => [
                        'label' => 'Guild',
                        'route' => 'PServerRanking/guild',
                        'uri' => '#',
                        'visible' => false,
                        'pages' => [
                            'detail' => [
                                'label' => 'Detail',
                                'route' => 'PServerRanking/guild',
                                'params' => [
                                    'action' => 'detail',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'pserver' => [
        'ranking' => [
            'top_player' => [
                'label' => 'Players',
                'route' => 'PServerRanking/ranking',
                'params' => [
                    'action' => 'top-player',
                ],
            ],
            'top_guild' => [
                'label' => 'Guilds',
                'route' => 'PServerRanking/ranking',
                'params' => [
                    'action' => 'top-guild',
                ],
            ],
        ],
    ],
];