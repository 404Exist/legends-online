<?php

use BjyAuthorize\Provider;
use PaymentAPI\Controller as APIController;
use PServerAdmin\Controller as AdminController;
use PServerAdminStatistic\Controller as AdminStatisticController;
use PServerCore\Controller as CoreController;
use PServerPanel\Controller as PanelController;
use PServerRanking\Controller as RankingController;
use ZfcSitemap\Controller as ZfcSitemapController;
use PServerCMS\SROUnique\Controller as SROUnique;
use PServerCMS\SROKill\Controller as SROKill;
use PServerCMS\DonateAction\Controller as DonateAction;
use PServerCMS\EPin\Controller as EPinController;

return [
    'bjyauthorize' => [

        // set the 'guest' role as default (must be defined in a role provider]
        'default_role' => 'guest',

        /* this module uses a meta-role that inherits from any roles that should
         * be applied to the active user. the identity provider tells us which
         * roles the "identity role" should inherit from.
         *
         * for ZfcUser, this will be your default identity provider
         */
        'identity_provider' => Provider\Identity\AuthenticationIdentityProvider::class,

        /* If you only have a default role and an authenticated role, you can
         * use the 'AuthenticationIdentityProvider' to allow/restrict access
         * with the guards based on the state 'logged in' and 'not logged in'.
         *
         * 'default_role'       => 'guest',         // not authenticated
         * 'authenticated_role' => 'user',          // authenticated
         * 'identity_provider'  => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
         */

        /* role providers simply provide a list of roles that should be inserted
         * into the Zend\Acl instance. the module comes with two providers, one
         * to specify roles in a config file and one to load roles using a
         * Zend\Db adapter.
         */
        'role_providers' => [
            // this will load roles from
            // the 'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' service
            Provider\Role\ObjectRepositoryProvider::class => [
                // class name of the entity representing the role
                'role_entity_class' => \PServerCore\Entity\UserRole::class,
                // service name of the object manager
                'object_manager' => 'doctrine.entitymanager.orm_default',
            ],
        ],

        // resource providers provide a list of resources that will be tracked
        // in the ACL. like roles, they can be hierarchical
        'resource_providers' => [
            Provider\Resource\Config::class => [
                'PServerCore' => [],
                'PServerCore/site-download' => [],
                'PServerCore/site-detail' => [],
                'PServerCore/user' => [],
                'PServerCore/captcha' => [],
                'PServerCore/coins' => [],
                'PServerCore/panel_donate' => [],
                'small-user-auth' => [],
                'zfc-ticketsystem' => [],
                'zfc-ticketsystem-admin' => [],
                'PServerPanel/character' => [],
                'PServerPanel/vote' => [],
                'PServerPanel/maxigame' => [],
                'PServerPanel/hipopotamya' => [],
                'PServerPanel/tiklaode' => [],
                'PServerPanel/resend_register' => [],
                'PServerRankingMain' => [],
                'PServerRanking/ranking' => [],
                'PServerAdmin/home' => [],
                'PServerAdmin/news' => [],
                'PServerAdmin/settings' => [],
                'PServerAdmin/download' => [],
                'PServerAdmin/server_info' => [],
                'PServerAdmin/donate' => [],
                'PServerAdmin/log' => [],
                'PServerAdmin/log_login_history' => [],
                'PServerAdmin/log_login_failed' => [],
                'PServerAdmin/vote' => [],
                'PServerAdmin/user' => [],
                'PServerAdmin/user_edit' => [],
                'PServerAdmin/user_role' => [],
                'PServerAdmin/user_block' => [],
                'PServerAdmin/user_coin' => [],
                'PServerAdmin/user_helper' => [],
                'PServerAdmin/ticket_system_category' => [],
                'PServerAdmin/secret_question' => [],
                'PServerAdminStatistic/user' => [],
                'PServerAdminStatistic/player' => [],

                // SRO - START
                'PServerRanking/sro_ranking_job' => [],
                'PServerRanking/sro_ranking_honor' => [],
                'PServerRanking/sro_alliance' => [],
                'PServerRanking/sro_custom_ranking' => [],
                'PServerSRO/player_map' => [],
                'PServerSRO/un_stuck' => [],
                'PServerSRO/admin_character' => [],
                'PServerSRO/admin_smc_log' => [],
                'PServerSRO/admin_job_name_history' => [],
                'PServerSRO/admin_log_event_char' => [],
                'PServerSRO/admin_log_event_item' => [],
                // SRO - END

                // UNIQUE - START
                'PServerRanking/sro_ranking_unique' => [],
                // UNIQUE - END

                // SRO-KILL START
                'PServerRanking/sro_ranking_kill' => [],
                // SRO-KILL END

                // DonateAction - START
                'PServerCMSDonateAction/stats' => [],
                // DonateAction - END

                // EPin - START
                'PServerAdmin/e-pin' => [],
                'PServerCore/e-pin' => [],
                // EPin - END
            ],
        ],


        /* rules can be specified here with the format:
         * [roles (array], resource, [privilege (array|string], assertion]]
         * assertions will be loaded using the service manager and must implement
         * Zend\Acl\Assertion\AssertionInterface.
         * *if you use assertions, define them using the service manager!*
         */
        'rule_providers' => [
            Provider\Rule\Config::class => [
                'allow' => [
                    // allow guests and users (and admins, through inheritance]
                    // the "wear" privilege on the resource "pants"
                    ['guest', 'small-user-auth', 'index'],
                    [[], 'small-user-auth', 'logout'],
                    [[], 'PServerCore'],
                    [[], 'PServerCore/site-download'],
                    [[], 'PServerCore/site-detail'],
                    [[], 'PServerCore/captcha'],
                    [['user'], 'PServerCore/coins'],
                    [['user'], 'PServerCore/user'],
                    [['user'], 'PServerCore/panel_donate'],
                    [['user'], 'zfc-ticketsystem'],
                    [['admin'], 'zfc-ticketsystem-admin'],
                    [['user'], 'PServerPanel/character'],
                    [['user'], 'PServerPanel/vote'],
                    [['user'], 'PServerPanel/maxigame'],
                    [['user'], 'PServerPanel/hipopotamya'],
                    [['user'], 'PServerPanel/tiklaode'],
                    [['not_active'], 'PServerPanel/resend_register'],
                    [[], 'PServerRankingMain'],
                    [[], 'PServerRanking/ranking'],
                    [['admin', 'coin_reseller'], 'PServerAdmin/home'],
                    [['admin'], 'PServerAdmin/news'],
                    [['admin'], 'PServerAdmin/settings'],
                    [['admin'], 'PServerAdmin/download'],
                    [['admin'], 'PServerAdmin/server_info'],
                    [['admin'], 'PServerAdmin/donate'],
                    [['admin'], 'PServerAdmin/log'],
                    [['admin'], 'PServerAdmin/log_login_history'],
                    [['admin'], 'PServerAdmin/log_login_failed'],
                    [['admin'], 'PServerAdmin/vote'],
                    [['admin', 'coin_reseller'], 'PServerAdmin/user'],
                    [['admin'], 'PServerAdmin/user_edit'],
                    [['admin'], 'PServerAdmin/user_role'],
                    [['admin'], 'PServerAdmin/user_block'],
                    [['admin', 'coin_reseller'], 'PServerAdmin/user_coin'],
                    [['admin'], 'PServerAdmin/user_helper'],
                    [['admin'], 'PServerAdmin/ticket_system_category'],
                    [['admin'], 'PServerAdmin/secret_question'],
                    [['admin'], 'PServerAdminStatistic/user'],
                    [['admin'], 'PServerAdminStatistic/player'],

                    // SRO - START
                    [[], 'PServerRanking/sro_ranking_job'],
                    [[], 'PServerRanking/sro_ranking_honor'],
                    [[], 'PServerRanking/sro_alliance'],
                    [[], 'PServerRanking/sro_custom_ranking'],
                    [[], 'PServerSRO/player_map'],
                    [['user'],  'PServerSRO/un_stuck'],
                    [['admin'], 'PServerSRO/admin_character'],
                    [['admin'], 'PServerSRO/admin_smc_log'],
                    [['admin'], 'PServerSRO/admin_job_name_history'],
                    [['admin'], 'PServerSRO/admin_log_event_char'],
                    [['admin'], 'PServerSRO/admin_log_event_item'],
                    // SRO - END

                    // UNIQUE -START
                    [[], 'PServerRanking/sro_ranking_unique'],
                    // UNIQUE - END

                    // SRO-KILL START
                    [[], 'PServerRanking/sro_ranking_kill'],
                    // SRO-KILL END

                    // DonateAction - START
                    [['user'], 'PServerCMSDonateAction/stats'],
                    // DonateAction - END

                    // EPin - START
                    [['admin'], 'PServerAdmin/e-pin'],
                    [['user'], 'PServerCore/e-pin'],
                    // EPin - END
                ],

                // Don't mix allow/deny rules if you are using role inheritance.
                // There are some weird bugs.
                'deny' => [
                    ['guest', 'small-user-auth', 'logout'],
                ],
            ],
        ],


        /* Currently, only controller and route guards exist
         *
         * Consider enabling either the controller or the route guard depending on your needs.
         */
        'guards' => [
            /* If this guard is specified here (i.e. it is enabled], it will block
             * access to all controllers and actions unless they are specified here.
             * You may omit the 'action' index to allow access to the entire controller
             */
            BjyAuthorize\Guard\Controller::class => [
                // Below is the default index action used by the ZendSkeletonApplication
                ['controller' => CoreController\IndexController::class, 'roles' => []],
                ['controller' => CoreController\AuthController::class, 'roles' => ['guest', 'user', 'not_active']],
                ['controller' => CoreController\AuthController::class, 'roles' => [], 'action' => ['logout']],
                ['controller' => CoreController\SiteController::class, 'roles' => []],
                ['controller' => CoreController\InfoController::class, 'roles' => []],
                ['controller' => CoreController\CaptchaController::class, 'roles' => []],
                ['controller' => RankingController\RankingController::class, 'roles' => []],
                ['controller' => RankingController\CharacterController::class, 'roles' => []],
                ['controller' => RankingController\GuildController::class, 'roles' => []],
                ['controller' => RankingController\SearchController::class, 'roles' => []],
                ['controller' => CoreController\AccountController::class, 'roles' => ['user']],
                ['controller' => CoreController\DonateController::class, 'roles' => ['user']],
                ['controller' => CoreController\CoinsController::class, 'roles' => ['user']],
                ['controller' => PanelController\CharacterController::class, 'roles' => ['user']],
                ['controller' => PanelController\VoteController::class, 'roles' => ['user']],
                ['controller' => PanelController\VotePostbackController::class, 'roles' => []],
                ['controller' => PanelController\MaxigameController::class, 'roles' => ['user']],
                ['controller' => PanelController\HipopotamyaController::class, 'roles' => ['user']],
                ['controller' => PanelController\TiklaodeController::class, 'roles' => ['user']],
                ['controller' => PanelController\ResendRegisterController::class, 'roles' => ['not_active']],
                ['controller' => 'ZfcTicketSystem\Controller\TicketSystem', 'roles' => ['user']],
                ['controller' => ZfcTicketSystem\Controller\TicketSystemController::class, 'roles' => ['user']],
                ['controller' => 'SmallUser\Controller\Auth', 'roles' => ['guest', 'user', 'not_active']],
                ['controller' => 'SmallUser\Controller\Auth', 'roles' => [], 'action' => ['logout']],
                ['controller' => AdminController\IndexController::class, 'roles' => ['admin', 'coin_reseller']],
                ['controller' => AdminController\NewsController::class, 'roles' => ['admin']],
                ['controller' => AdminController\SettingsController::class, 'roles' => ['admin']],
                ['controller' => AdminController\DownloadController::class, 'roles' => ['admin']],
                ['controller' => AdminController\ServerInfoController::class, 'roles' => ['admin']],
                ['controller' => AdminController\DonateController::class, 'roles' => ['admin']],
                ['controller' => AdminController\LogController::class, 'roles' => ['admin']],
                ['controller' => AdminController\LoginLogController::class, 'roles' => ['admin']],
                ['controller' => AdminController\VoteController::class, 'roles' => ['admin']],
                ['controller' => AdminController\UserPanelController::class, 'roles' => ['admin', 'coin_reseller']],
                ['controller' => AdminController\UserEditController::class, 'roles' => ['admin']],
                ['controller' => AdminController\UserRoleController::class, 'roles' => ['admin']],
                ['controller' => AdminController\UserBlockController::class, 'roles' => ['admin']],
                ['controller' => AdminController\UserCoinController::class, 'roles' => ['admin', 'coin_reseller']],
                ['controller' => AdminController\UserHelperController::class, 'roles' => ['admin']],
                ['controller' => AdminController\TicketSystemCategoryController::class, 'roles' => ['admin']],
                ['controller' => AdminController\TicketSystemController::class, 'roles' => ['admin']],
                ['controller' => AdminController\SecretQuestionController::class, 'roles' => ['admin']],
                ['controller' => AdminStatisticController\UserController::class, 'roles' => ['admin']],
                ['controller' => AdminStatisticController\PlayerController::class, 'roles' => ['admin']],
                ['controller' => APIController\PaymentWallController::class, 'roles' => []],
                ['controller' => APIController\PayopController::class, 'roles' => []],
                ['controller' => APIController\UnitPayController::class, 'roles' => []],
                ['controller' => APIController\PaywantController::class, 'roles' => []],
                ['controller' => APIController\CentAppController::class, 'roles' => []],
                ['controller' => APIController\StripeController::class, 'roles' => []],
                ['controller' => APIController\PayPalController::class, 'roles' => []],

                ['controller' => ZfcSitemapController\IndexController::class, 'roles' => []],


                // SRO - START
                ['controller' => \PServerSRO\Controller\RankingJobController::class, 'roles' => []],
                ['controller' => \PServerSRO\Controller\HonorRankingController::class, 'roles' => []],
                ['controller' => \PServerSRO\Controller\AllianceController::class, 'roles' => []],
                ['controller' => \PServerSRO\Controller\CustomRankingController::class, 'roles' => []],
                ['controller' => \PServerSRO\Controller\PlayerMapController::class, 'roles' => []],
                ['controller' => \PServerSRO\Controller\UnStuckController::class, 'roles' => ['user']],
                ['controller' => \PServerSRO\Controller\AdminCharacterController::class, 'roles' => ['admin']],
                ['controller' => \PServerSRO\Controller\AdminSMCLogController::class, 'roles' => ['admin']],
                ['controller' => \PServerSRO\Controller\AdminJobNameHistoryController::class, 'roles' => ['admin']],
                ['controller' => \PServerSRO\Controller\AdminLogEventCharController::class, 'roles' => ['admin']],
                ['controller' => \PServerSRO\Controller\AdminLogEventItemController::class, 'roles' => ['admin']],
                // SRO - END

                // UNIQUE -START
                ['controller' => SROUnique\RankingUniqueController::class, 'roles' => []],
                // UNIQUE - END

                // SRO-KILL -START
                ['controller' => SROKill\RankingKillCounterController::class, 'roles' => []],
                // SRO-KILL - END

                // DonateAction - START
                ['controller' => DonateAction\StatsController::class, 'roles' => ['user']],
                // DonateAction - END

                // EPin - START
                ['controller' => EPinController\AdminEpinController::class, 'roles' => ['admin']],
                ['controller' => EPinController\EPinController::class, 'roles' => ['user']],
                // EPin - END

                // RankingMain - START
                ['controller' =>\PServerCMS\RankingMain\Controller\RankingController::class, 'roles' => []],
                // RankingMain - END
            ],
        ],
        // strategy service name for the strategy listener to be used when permission-related errors are detected
        'unauthorized_strategy' => BjyAuthorize\View\UnauthorizedStrategy::class,

        // Template name for the unauthorized strategy
        'template' => 'error/403',

        // cache options have to be compatible with Zend\Cache\StorageFactory::factory
        'cache_options' => [
            'adapter' => [
                'name' => 'memory',
            ],
            'plugins' => [
                'serializer',
            ]
        ],

        // Key used by the cache for caching the acl
        'cache_key' => 'bjyauthorize_acl'
    ],
];