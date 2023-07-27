<?php

namespace PServerAdmin;

use PServerAdmin\Form\UserFilterFactory;
use PServerAdmin\View\Helper;
use Laminas\Router\Http;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'PServerAdmin' => [
                'type' => Http\Literal::class,
                'options' => [
                    'route' => '/admin',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                        'page' => 1
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'home' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '[/:page].html',
                            'constraints' => [
                                'page' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action' => 'index',
                                'page' => 1
                            ],
                        ],
                    ],
                    'news' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/news[/:action][-:id].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\NewsController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'settings' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/settings[/:action][-:type].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'type' => '[a-zA-Z0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\SettingsController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'download' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/download[/:action][-:id].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\DownloadController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'server_info' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/server-info[/:action][-:id].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ServerInfoController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'donate' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/donate[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\DonateController::class,
                                'action' => 'over-view',
                            ],
                        ],
                    ],
                    'log' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/log[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\LogController::class,
                            ],
                        ],
                    ],
                    'log_login_history' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/log/login/history.html',
                            'defaults' => [
                                'controller' => Controller\LoginLogController::class,
                                'action' => 'history',
                            ],
                        ],
                    ],
                    'log_login_failed' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/log/login/failed.html',
                            'defaults' => [
                                'controller' => Controller\LoginLogController::class,
                                'action' => 'failed',
                            ],
                        ],
                    ],
                    'user' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user-panel[/:action[-:usrId]].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'usrId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserPanelController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'user_detail' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user-panel/detail[/:action]-[:usrId].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'usrId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserPanelController::class,
                                'action' => 'detail',
                            ],
                        ],
                    ],
                    'user_edit' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user-edit/[:usrId].html',
                            'constraints' => [
                                'usrId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserEditController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'user_role' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user-role/[:action]-[:usrId][/:roleId].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'usrId' => '[0-9]+',
                                'roleId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserRoleController::class,
                            ],
                        ],
                    ],
                    'user_block' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user-block[/:action][-:usrId].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'usrId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserBlockController::class,
                                'action' => 'index'
                            ],
                        ],
                    ],
                    'user_coin' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user-coin/[:action]-[:usrId].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'usrId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserCoinController::class,
                            ],
                        ],
                    ],
                    'user_helper' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/user-helper/[:action]/[:usrId].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                                'usrId' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\UserHelperController::class,
                            ],
                        ],
                    ],
                    'vote' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/vote[/:action][-:id].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\VoteController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'ticket_system_category' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/ticket-system/category[/:action][-:id].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\TicketSystemCategoryController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'secret_question' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => '/secret-question[/:action][-:id].html',
                            'constraints' => [
                                'action' => '[a-zA-Z]+',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\SecretQuestionController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
            'zfc-ticketsystem-admin' => [
                'options' => [
                    'defaults' => [
                        'controller' => Controller\TicketSystemController::class,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\IndexFactory::class,
            Controller\NewsController::class => Controller\NewsFactory::class,
            Controller\SettingsController::class => Controller\SettingsFactory::class,
            Controller\DownloadController::class => Controller\DownloadFactory::class,
            Controller\ServerInfoController::class => Controller\ServerInfoFactory::class,
            Controller\DonateController::class => Controller\DonateFactory::class,
            Controller\LogController::class => Controller\LogFactory::class,
            Controller\VoteController::class => Controller\VoteFactory::class,
            Controller\UserPanelController::class => Controller\UserPanelFactory::class,
            Controller\UserEditController::class => Controller\UserEditFactory::class,
            Controller\UserRoleController::class => Controller\UserRoleFactory::class,
            Controller\UserBlockController::class => Controller\UserBlockFactory::class,
            Controller\UserCoinController::class => Controller\UserCoinFactory::class,
            Controller\UserHelperController::class => Controller\UserHelperFactory::class,
            Controller\TicketSystemCategoryController::class => Controller\TicketSystemCategoryFactory::class,
            Controller\TicketSystemController::class => Controller\TicketSystemFactory::class,
            Controller\SecretQuestionController::class => Controller\SecretQuestionFactory::class,
            Controller\LoginLogController::class => Controller\LoginLogFactory::class,
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'userPanelBlockHistoryList' => Helper\UserBlockHistory::class,
            'userPanelLoginHistoryList' => Helper\UserLoginHistory::class,
            'userPanelDonateHistoryList' => Helper\UserDonateHistory::class,
            'userPanelCharacterList' => Helper\UserCharacterList::class,
            'userPanelTicketOverview' => Helper\UserTicketList::class,
            'userPanelCoinsWidget' => Helper\UserCoinsWidget::class,
            'userPanelBlockWidget' => Helper\UserBlockWidget::class,
            'userPanelRoleWidget' => Helper\UserRoleWidget::class,
            'userPanelWidget' => Helper\UserPanelWidget::class,
            'parsedown' => Helper\Parsedown::class,
        ],
        'factories' => [
            Helper\UserBlockHistory::class => Helper\UserBlockHistoryFactory::class,
            Helper\UserLoginHistory::class => Helper\UserLoginHistoryFactory::class,
            Helper\UserDonateHistory::class => Helper\UserDonateHistoryFactory::class,
            Helper\UserCharacterList::class => Helper\UserCharacterListFactory::class,
            Helper\UserTicketList::class => Helper\UserTicketListFactory::class,
            Helper\UserCoinsWidget::class => Helper\UserCoinsWidgetFactory::class,
            Helper\UserBlockWidget::class => Helper\UserBlockWidgetFactory::class,
            Helper\UserRoleWidget::class => Helper\UserRoleWidgetFactory::class,
            Helper\UserPanelWidget::class => Helper\UserPanelWidgetFactory::class,
            Helper\Parsedown::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'layout/admin' => __DIR__ . '/../view/layout/admin.twig',
            'p-server-admin/navigation' => __DIR__ . '/../view/helper/navigation.phtml',
            'p-server-admin/news/index' => __DIR__ . '/../view/p-server-admin/news/index.phtml',
            'p-server-admin/vote/index' => __DIR__ . '/../view/p-server-admin/vote/index.phtml',
            'p-server-admin/download/index' => __DIR__ . '/../view/p-server-admin/download/index.phtml',
            'p-server-admin/server-info/index' => __DIR__ . '/../view/p-server-admin/server-info/index.phtml',
            'p-server-admin/ticket_system_category/index' => __DIR__ . '/../view/p-server-admin/ticket-system-category/index.phtml',
            'p-server-admin/secret_question/index' => __DIR__ . '/../view/p-server-admin/secret-question/index.phtml',
            'p-server-admin/user-panel/user-block-history' => __DIR__ . '/../view/helper/user-panel/user-block-history.phtml',
            'p-server-admin/user-panel/user-login-history' => __DIR__ . '/../view/helper/user-panel/user-login-history.phtml',
            'p-server-admin/user-panel/user-donate-history' => __DIR__ . '/../view/helper/user-panel/user-donate-history.phtml',
            'p-server-admin/user-panel/user-character' => __DIR__ . '/../view/helper/user-panel/user-character.phtml',
            'p-server-admin/user-panel/user-ticket' => __DIR__ . '/../view/helper/user-panel/user-ticket.phtml',
            'p-server-admin/user-panel/user-coins-widget' => __DIR__ . '/../view/helper/user-panel/user-coins-widget.phtml',
            'p-server-admin/user-panel/user-block-widget' => __DIR__ . '/../view/helper/user-panel/user-block-widget.phtml',
            'p-server-admin/user-panel/user-role-widget' => __DIR__ . '/../view/helper/user-panel/user-role-widget.phtml',
            'p-server-admin/user-panel/widget' => __DIR__ . '/../view/helper/user-panel/widget.phtml',
            'p-server-admin/abstract-datagrid/delete' => __DIR__ . '/../view/p-server-admin/abstract-datagrid/delete.twig',
            'p-server-admin/abstract-datagrid/detail' => __DIR__ . '/../view/p-server-admin/abstract-datagrid/detail.twig',
            'p-server-admin/abstract-datagrid/new' => __DIR__ . '/../view/p-server-admin/abstract-datagrid/new.twig',
            'zfc-datagrid/renderer/bootstrapTable/layout' => './vendor/zfc-datagrid/zfc-datagrid/view/zfc-datagrid/renderer/bootstrap4Table/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'validators' => [
        'factories' => [
            Validator\VotePostback::class => InvokableFactory::class,
        ],
    ],
    'form_elements' => [
        'aliases' => [
            'pserver_admin_news_form' => Form\News::class,
            'pserver_admin_page_info_form' => Form\PageInfo::class,
            'pserver_admin_server_info_form' => Form\ServerInfo::class,
            'pserver_admin_download_form' => Form\Download::class,
            'pserver_admin_user_role_form' => Form\UserRole::class,
            'pserver_admin_user_block_form' => Form\UserBlock::class,
            'pserver_admin_coin_form' => Form\Coin::class,
            'pserver_admin_vote_form' => Form\Vote::class,
            'pserver_admin_secret_question_form' => Form\SecretQuestion::class,
        ],
        'factories' => [
            Form\User::class => Form\UserFactory::class,
            Form\News::class => Form\NewsFactory::class,
            Form\PageInfo::class => Form\PageInfoFactory::class,
            Form\ServerInfo::class => Form\ServerInfoFactory::class,
            Form\Download::class => Form\DownloadFactory::class,
            Form\UserRole::class => Form\UserRoleFactory::class,
            Form\UserBlock::class => Form\UserBlockFactory::class,
            Form\Coin::class => Form\CoinFactory::class,
            Form\Vote::class => Form\VoteFactory::class,
            Form\SecretQuestion::class => Form\SecretQuestionFactory::class,
        ],
    ],
    'input_filters' => [
        'factories' => [
            Form\CoinFilter::class => InvokableFactory::class,
            Form\DownloadFilter::class => InvokableFactory::class,
            Form\NewsFilter::class => InvokableFactory::class,
            Form\PageInfoFilter::class => InvokableFactory::class,
            Form\SecretQuestionFilter::class => InvokableFactory::class,
            Form\ServerInfoFilter::class => InvokableFactory::class,
            Form\UserBlockFilter::class => InvokableFactory::class,
            Form\UserFilter::class => UserFilterFactory::class,
            Form\UserRoleFilter::class => InvokableFactory::class,
            Form\VoteFilter::class => InvokableFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'pserveradmin_user_panel_service' => Service\UserPanel::class,
            'pserveradmin_user_block_service' => Service\UserBlock::class,
            'pserver_admin_github_api_options' => Options\GithubAPI::class,
        ],
        'factories' => [
            Service\Coin::class => Service\CoinFactory::class,
            Service\UserPanel::class => Service\UserPanelFactory::class,
            Service\UserBlock::class => Service\UserBlockFactory::class,
            Service\GithubAPI::class => Service\GithubAPIFactory::class,
            Service\SecretQuestion::class => Service\SecretQuestionFactory::class,
            Service\Download::class => Service\DownloadFactory::class,
            Service\News::class => Service\NewsFactory::class,
            Service\PageInfo::class => Service\PageInfoFactory::class,
            Service\ServerInfo::class => Service\ServerInfoFactory::class,
            Service\Vote::class => Service\VoteFactory::class,
            Service\TicketSystemCategory::class => Service\TicketSystemCategoryFactory::class,
            Service\LoginLog::class => Service\LoginLogFactory::class,
            Options\GithubAPI::class => Options\GithubAPIFactory::class,
        ],
    ],
    'navigation' => [
        'pserveradmin' => [
            'admin_home' => [
                'label' => 'Home',
                'route' => 'PServerAdmin/home',
                'resource' => 'PServerAdmin/home',
            ],
            'admin_user' => [
                'label' => 'UserPanel',
                'route' => 'PServerAdmin/user',
                'resource' => 'PServerAdmin/user',
                'pages' => [
                    'user_panel_detail' => [
                        'label' => 'UserDetails',
                        'route' => 'PServerAdmin/user_detail',
                        'visible' => false,
                        'pages' => [
                            'user_edit' => [
                                'label' => 'UserEdit',
                                'route' => 'PServerAdmin/user_edit',
                                'visible' => false,
                            ],
                        ],
                    ],
                ],
            ],
            'admin_news' => [
                'label' => 'News',
                'route' => 'PServerAdmin/news',
                'resource' => 'PServerAdmin/news',
                'action' => 'index',
                'pages' => [
                    'new' => [
                        'label' => 'New',
                        'route' => 'PServerAdmin/news',
                        'action' => 'new',
                        'visible' => false,
                    ],
                    'detail' => [
                        'label' => 'Detail',
                        'route' => 'PServerAdmin/news',
                        'action' => 'detail',
                        'visible' => false,
                    ],
                    'delete' => [
                        'label' => 'Delete',
                        'route' => 'PServerAdmin/news',
                        'action' => 'delete',
                        'visible' => false,
                    ],
                ],
            ],
            'admin_settings' => [
                'label' => 'Settings',
                'uri' => '#',
                'resource' => 'PServerAdmin/settings',
                'pages' => [
                    'faq' => [
                        'label' => 'FAQ',
                        'route' => 'PServerAdmin/settings',
                        'params' => [
                            'action' => 'pageInfo',
                            'type' => 'faq',
                        ],
                        'resource' => 'PServerAdmin/settings',
                    ],
                    'rules' => [
                        'label' => 'Rules',
                        'route' => 'PServerAdmin/settings',
                        'params' => [
                            'action' => 'pageInfo',
                            'type' => 'rules',
                        ],
                        'resource' => 'PServerAdmin/settings',
                    ],
                    'guides' => [
                        'label' => 'Guides',
                        'route' => 'PServerAdmin/settings',
                        'params' => [
                            'action' => 'pageInfo',
                            'type' => 'guides',
                        ],
                        'resource' => 'PServerAdmin/settings',
                    ],
                    'events' => [
                        'label' => 'Events',
                        'route' => 'PServerAdmin/settings',
                        'params' => [
                            'action' => 'pageInfo',
                            'type' => 'events',
                        ],
                        'resource' => 'PServerAdmin/settings',
                    ],
                ],
            ],
            'admin_download' => [
                'label' => 'Download',
                'route' => 'PServerAdmin/download',
                'resource' => 'PServerAdmin/download',
                'action' => 'index',
                'pages' => [
                    'new' => [
                        'label' => 'New',
                        'route' => 'PServerAdmin/download',
                        'action' => 'new',
                        'visible' => false,
                    ],
                    'detail' => [
                        'label' => 'Detail',
                        'route' => 'PServerAdmin/download',
                        'action' => 'detail',
                        'visible' => false,
                    ],
                    'delete' => [
                        'label' => 'Delete',
                        'route' => 'PServerAdmin/download',
                        'action' => 'delete',
                        'visible' => false,
                    ],
                ],
            ],
            'admin_server_info' => [
                'label' => 'ServerInfo',
                'route' => 'PServerAdmin/server_info',
                'resource' => 'PServerAdmin/server_info',
                'action' => 'index',
                'pages' => [
                    'new' => [
                        'label' => 'New',
                        'route' => 'PServerAdmin/server_info',
                        'action' => 'new',
                        'visible' => false,
                    ],
                    'detail' => [
                        'label' => 'Detail',
                        'route' => 'PServerAdmin/server_info',
                        'action' => 'detail',
                        'visible' => false,
                    ],
                    'delete' => [
                        'label' => 'Delete',
                        'route' => 'PServerAdmin/server_info',
                        'action' => 'delete',
                        'visible' => false,
                    ],
                ],
            ],
            'zfc-ticketsystem-admin' => [
                'label' => 'TicketSystem',
                'uri' => '#',
                'resource' => 'zfc-ticketsystem-admin',
                'pages' => [
                    'new' => [
                        'label' => 'New',
                        'route' => 'zfc-ticketsystem-admin',
                        'params' => [
                            'type' => '0'
                        ],
                        'resource' => 'zfc-ticketsystem-admin',
                    ],
                    'open' => [
                        'label' => 'Open',
                        'route' => 'zfc-ticketsystem-admin',
                        'params' => [
                            'type' => '1'
                        ],
                        'resource' => 'zfc-ticketsystem-admin',
                    ],
                    'category' => [
                        'label' => 'Category',
                        'route' => 'PServerAdmin/ticket_system_category',
                        'resource' => 'PServerAdmin/ticket_system_category',
                    ],
                    'ticket_detail' => [
                        'label' => 'Ticket-Detail',
                        'route' => 'zfc-ticketsystem-admin',
                        'action' => 'view',
                        'visible' => false,
                    ],
                ],
            ],
            'admin_server_secret_question' => [
                'label' => 'SecretQuestion',
                'route' => 'PServerAdmin/secret_question',
                'resource' => 'PServerAdmin/secret_question',
                'action' => 'index',
                'pages' => [
                    'new' => [
                        'label' => 'New',
                        'route' => 'PServerAdmin/secret_question',
                        'action' => 'new',
                        'visible' => false,
                    ],
                    'detail' => [
                        'label' => 'Detail',
                        'route' => 'PServerAdmin/secret_question',
                        'action' => 'detail',
                        'visible' => false,
                    ],
                    'delete' => [
                        'label' => 'Delete',
                        'route' => 'PServerAdmin/secret_question',
                        'action' => 'delete',
                        'visible' => false,
                    ],
                ],
            ],
            'admin_donate' => [
                'label' => 'Donate',
                'uri' => '#',
                'resource' => 'PServerAdmin/donate',
                'pages' => [
                    'overview' => [
                        'label' => 'OverView',
                        'route' => 'PServerAdmin/donate',
                        'params' => [
                            'action' => 'over-view'
                        ],
                        'resource' => 'PServerAdmin/donate',
                    ],
                    'statistic' => [
                        'label' => 'Statistic',
                        'route' => 'PServerAdmin/donate',
                        'params' => [
                            'action' => 'statistic'
                        ],
                        'resource' => 'PServerAdmin/donate',
                    ],
                ],
            ],
            'admin_server_vote' => [
                'label' => 'Vote',
                'route' => 'PServerAdmin/vote',
                'resource' => 'PServerAdmin/vote',
                'action' => 'index',
                'pages' => [
                    'new' => [
                        'label' => 'New',
                        'route' => 'PServerAdmin/vote',
                        'action' => 'new',
                        'visible' => false,
                    ],
                    'detail' => [
                        'label' => 'Detail',
                        'route' => 'PServerAdmin/vote',
                        'action' => 'detail',
                        'visible' => false,
                    ],
                    'delete' => [
                        'label' => 'Delete',
                        'route' => 'PServerAdmin/vote',
                        'action' => 'delete',
                        'visible' => false,
                    ],
                ],
            ],
            'admin_log' => [
                'label' => 'Logs',
                'uri' => '#',
                'resource' => 'PServerAdmin/log',
                'pages' => [
                    'web' => [
                        'label' => 'Web',
                        'route' => 'PServerAdmin/log',
                        'params' => [
                            'action' => 'web'
                        ],
                        'resource' => 'PServerAdmin/log',
                    ],
                    'block_history' => [
                        'label' => 'BlockHistory',
                        'route' => 'PServerAdmin/user_block',
                        'resource' => 'PServerAdmin/user_block',
                    ],
                    'log_login_history' => [
                        'label' => 'LoginHistory',
                        'route' => 'PServerAdmin/log_login_history',
                        'resource' => 'PServerAdmin/log_login_history',
                    ],
                    'log_login_failed' => [
                        'label' => 'LoginFailed',
                        'route' => 'PServerAdmin/log_login_failed',
                        'resource' => 'PServerAdmin/log_login_failed',
                    ],
                ],
            ],
        ],
    ],
    'p-server-admin' => [
        'github_api' => [
            'cache_dir' => __DIR__ . '/../../../../data/cache',
        ],
        'user-panel' => [
            'detail' => [
                'view-helper-list' => [
                    'userPanelLoginHistoryList' => [
                        'view-helper' => 'userPanelLoginHistoryList',
                    ],
                    'userPanelDonateHistoryList' => [
                        'route' => 'PServerAdmin/donate',
                        'view-helper' => 'userPanelDonateHistoryList',
                        'params' => [
                            10,
                        ],
                    ],
                    'userPanelCharacterList' => [
                        'view-helper' => 'userPanelCharacterList',
                    ],
                    'userPanelCoinsWidget' => [
                        'route' => 'PServerAdmin/user_coin',
                        'view-helper' => 'userPanelCoinsWidget',
                    ],
                    'userPanelBlockHistoryList' => [
                        'route' => 'PServerAdmin/user_block',
                        'view-helper' => 'userPanelBlockHistoryList',
                    ],
                    'userPanelTicketOverview' => [
                        'route' => 'zfc-ticketsystem-admin',
                        'view-helper' => 'userPanelTicketOverview',
                    ],
                ],
            ],
        ],
    ],
];
