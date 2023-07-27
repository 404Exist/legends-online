<?php

namespace PServerCore;

use Laminas\Authentication\AuthenticationService;
use Laminas\Authentication\AuthenticationServiceInterface;
use Laminas\I18n\Translator\Loader\Gettext;
use Laminas\I18n\Translator\Translator;
use PServerCore\View\Helper;
use Laminas\Navigation\Service\NavigationAbstractServiceFactory;
use Laminas\Router\Http;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'PServerCore' => [
                'type' => Http\Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                        'page' => 1
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'site-news' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'news-[:page].html',
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
                    'site-detail' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'detail-[:type].html',
                            'constraints' => [
                                'type' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\SiteController::class,
                                'action' => 'page'
                            ],
                        ],
                    ],
                    'site-download' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'download.html',
                            'defaults' => [
                                'controller' => Controller\SiteController::class,
                                'action' => 'download'
                            ],
                        ],
                    ],
                    'user' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'panel/account[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\AccountController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'panel_donate' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'panel/donate[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\DonateController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'info' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'info[/:action].png',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\InfoController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'captcha' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'security/captcha[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\CaptchaController::class,
                            ],
                        ],
                    ],
                    'coins' => [
                        'type' => Http\Segment::class,
                        'options' => [
                            'route' => 'panel/coins[/:action].html',
                            'constraints' => [
                                'action' => '[a-zA-Z-]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\CoinsController::class,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            \Laminas\Cache\Service\StorageCacheAbstractServiceFactory::class,
            \Laminas\Log\LoggerAbstractServiceFactory::class,
            NavigationAbstractServiceFactory::class => NavigationAbstractServiceFactory::class,
        ],
        'aliases' => [
            'translator' => 'MvcTranslator',
            'payment_api_log_service' => Service\PaymentNotify::class,
            'zfcticketsystem_ticketsystem_service' => Service\TicketSystem::class,
            \ZfcTicketSystem\Service\TicketSystem::class => Service\TicketSystem::class,
            'payment_api_ip_service' => Service\Ip::class,
            'payment_api_validation' => Service\PaymentValidation::class,
            'pserver_options_collection' => Options\Collection::class,
            'pserver_usercodes_service' => Service\UserCodes::class,
            'pserver_timer_service' => Service\Timer::class,
            'pserver_cachinghelper_service' => Service\CachingHelper::class,
            'pserver_configread_service' => Service\ConfigRead::class,
            'pserver_donate_service' => Service\Donate::class,
            'pserver_format_service' => Service\Format::class,
            'pserver_login_history_service' => Service\LoginHistory::class,
            'pserver_log_service' => Service\Logs::class,
            'pserver_server_info_service' => Service\ServerInfo::class,
            'pserver_mail_service' => Service\Mail::class,
            'pserver_secret_question' => Service\SecretQuestion::class,
            'pserver_news_service' => Service\News::class,
            'pserver_download_service' => Service\Download::class,
            'pserver_add_email_service' => Service\AddEmail::class,
            'pserver_coin_service' => Service\Coin::class,
            'pserver_pageinfo_service' => Service\PageInfo::class,
            'pserver_playerhistory_service' => Service\PlayerHistory::class,
            'pserver_user_block_service' => Service\UserBlock::class,
            'pserver_user_role_service' => Service\UserRole::class,
            'small_user_service' => Service\User::class,
            'pserver_entity_options' => Options\EntityOptions::class,
            'pserver_mail_options' => Options\MailOptions::class,
            'pserver_general_options' => Options\GeneralOptions::class,
            'pserver_password_options' => Options\PasswordOptions::class,
            'pserver_user_code_options' => Options\UserCodeOptions::class,
            'pserver_login_options' => Options\LoginOptions::class,
            'pserver_register_options' => Options\RegisterOptions::class,
            'pserver_validation_options' => Options\ValidationOptions::class,
            AuthenticationService::class => AuthenticationServiceInterface::class,
            AuthenticationServiceInterface::class => \SmallUser\Service\UserAuthFactory::class,
            \PaymentAPI\Service\Ip::class => Service\Ip::class,
        ],
        'factories' => [
            'pserver_caching_service' => Service\CachingFactory::class,
            'pserver_paginator_caching_service' => Service\PaginatorCachingFactory::class,
            Service\Account::class => Service\AccountFactory::class,
            Service\TicketSystem::class => Service\TicketSystemFactory::class,
            Service\PaymentValidation::class => Service\PaymentValidationFactory::class,
            Options\Collection::class => Options\CollectionFactory::class,
            Service\Timer::class => InvokableFactory::class,
            Service\Ip::class => Service\IpFactory::class,
            Service\UserCodes::class => Service\UserCodesFactory::class,
            Service\CachingHelper::class => Service\CachingHelperFactory::class,
            Service\ConfigRead::class => Service\ConfigReadFactory::class,
            Service\Donate::class => Service\DonateFactory::class,
            Service\Format::class => InvokableFactory::class,
            Service\LoginHistory::class => Service\LoginHistoryFactory::class,
            Service\Logs::class => Service\LogsFactory::class,
            Service\ServerInfo::class => Service\ServerInfoFactory::class,
            Service\Mail::class => Service\MailFactory::class,
            Service\SecretQuestion::class => Service\SecretQuestionFactory::class,
            Service\News::class => Service\NewsFactory::class,
            Service\Download::class => Service\DownloadFactory::class,
            Service\AddEmail::class => Service\AddEmailFactory::class,
            Service\Coin::class => Service\CoinFactory::class,
            Service\PageInfo::class => Service\PageInfoFactory::class,
            Service\PlayerHistory::class => Service\PlayerHistoryFactory::class,
            Service\UserBlock::class => Service\UserBlockFactory::class,
            Service\UserRole::class => Service\UserRoleFactory::class,
            Service\CaptchaHandling::class => Service\CaptchaHandlingFactory::class,
            Service\PaymentNotify::class => Service\PaymentNotifyFactory::class,
            Service\PaymentNotifyCoins::class => InvokableFactory::class,
            \PaymentAPI\Service\Log::class => Service\PaymentNotifyFactory::class,
            Service\User::class => Service\UserFactory::class,
            Service\ChangeEmail::class => Service\ChangeEmailFactory::class,
            Options\EntityOptions::class => Options\EntityOptionsFactory::class,
            Options\MailOptions::class => Options\MailOptionsFactory::class,
            Options\GeneralOptions::class => Options\GeneralOptionsFactory::class,
            Options\PasswordOptions::class => Options\PasswordOptionsFactory::class,
            Options\UserCodeOptions::class => Options\UserCodeOptionsFactory::class,
            Options\LoginOptions::class => Options\LoginOptionsFactory::class,
            Options\RegisterOptions::class => Options\RegisterOptionsFactory::class,
            Options\ValidationOptions::class => Options\ValidationOptionsFactory::class,
            Guard\UserBlock::class => Guard\UserBlockFactory::class,
            Guard\UserRefresh::class => Guard\UserRefreshFactory::class,
            Listener\SitemapRemove::class => InvokableFactory::class,
            Translator::class => \Laminas\Mvc\I18n\TranslatorFactory::class,
            DBAL\Logging\DoctrineLogger::class => InvokableFactory::class,
        ],
        'delegators' => [
            Translator::class => [
                Service\TranslatorDelegator::class,
            ],
        ],
    ],
    'controllers' => [
        'aliases' => [
            'SmallUser\Controller\Auth' => Controller\AuthController::class,
        ],
        'factories' => [
            Controller\IndexController::class => Controller\IndexFactory::class,
            Controller\AuthController::class => Controller\AuthFactory::class,
            Controller\SiteController::class => Controller\SiteFactory::class,
            Controller\AccountController::class => Controller\AccountFactory::class,
            Controller\DonateController::class => Controller\DonateFactory::class,
            Controller\InfoController::class => Controller\InfoFactory::class,
            Controller\CaptchaController::class => Controller\CaptchaFactory::class,
            Controller\CoinsController::class => Controller\CoinsFactory::class,
        ],
    ],
    'form_elements' => [
        'aliases' => [
            'pserver_user_register_form' => Form\Register::class,
            'pserver_user_password_form' => Form\Password::class,
            'pserver_user_pwlost_form' => Form\PwLost::class,
            'pserver_user_changepwd_form' => Form\ChangePwd::class,
            'pserver_user_changepwd_game_form' => Form\ChangePwdGame::class,
            'pserver_user_add_mail_form' => Form\AddEmail::class,
            'zfcticketsystem_ticketsystem_new_form' => \ZfcTicketSystem\Form\TicketSystem::class,
            'zfcticketsystem_ticketsystem_entry_form' => \ZfcTicketSystem\Form\TicketEntry::class,
            'small_user_login_form' => \SmallUser\Form\Login::class,
        ],
        'factories' => [
            Form\Register::class => Form\RegisterFactory::class,
            Form\Password::class => Form\PasswordFactory::class,
            Form\PwLost::class => Form\PwLostFactory::class,
            Form\ChangePwd::class => Form\ChangePwdFactory::class,
            Form\ChangePwdGame::class => Form\ChangePwdGameFactory::class,
            Form\AddEmail::class => Form\AddEmailFactory::class,
            Form\ChangeEmail::class => Form\ChangeEmailFactory::class,
            Form\UsernameLost::class => Form\UsernameLostFactory::class,

            \ZfcTicketSystem\Form\TicketSystem::class => Form\TicketSystemFactory::class,
            \ZfcTicketSystem\Form\TicketEntry::class => Form\TicketEntryFactory::class,
            \SmallUser\Form\Login::class => Form\LoginFactory::class,
        ],
    ],
    'input_filters' => [
        'factories' => [
            Form\AddEmailFilter::class => Form\AddEmailFilterFactory::class,
            Form\ChangePwdFilter::class => Form\ChangePwdFilterFactory::class,
            Form\ChangePwdGameFilter::class => Form\ChangePwdGameFilterFactory::class,
            Form\ChangeEmailFilter::class => Form\ChangeEmailFilterFactory::class,
            Form\LoginFilter::class => Form\LoginFilterFactory::class,
            Form\PasswordFilter::class => Form\PasswordFilterFactory::class,
            Form\PwLostFilter::class => Form\PwLostFilterFactory::class,
            Form\RegisterFilter::class => Form\RegisterFilterFactory::class,
            Form\TicketEntryFilter::class => InvokableFactory::class,
            Form\TicketSystemFilter::class => InvokableFactory::class,
        ],
    ],
    'validators' => [
        'factories' => [
            Validator\NoRecordExists::class => InvokableFactory::class,
            Validator\PasswordRules::class => Validator\PasswordRulesFactory::class,
            Validator\RecordExists::class => InvokableFactory::class,
            Validator\SimilarText::class => Validator\SimilarTextFactory::class,
            Validator\StriposExists::class => Validator\StriposExistsFactory::class,
            Validator\UserNameBackendNotExists::class => Validator\UserNameBackendNotExistsFactory::class,
            Validator\ValidUserExists::class => InvokableFactory::class,
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'pserverformerrors' => Helper\FormError::class,
            'formLabel' => Helper\FormLabel::class,
            'formWidget' => Helper\FormWidget::class,
            'sidebarWidget' => Helper\SideBarWidget::class,
            'playerHistory' => Helper\PlayerHistory::class,
            'donateSum' => Helper\DonateSum::class,
            'donateCounter' => Helper\DonateCounter::class,
            'navigationWidgetPServerCore' => Helper\NavigationWidget::class,
            'dateTimeFormatTime' => Helper\DateTimeFormat::class,
            'newsWidget' => Helper\NewsWidget::class,
            'loggedInWidgetPServerCore' => Helper\LoggedInWidget::class,
            'loginWidgetPServerCore' => Helper\LoginWidget::class,
            'serverInfoWidgetPServerCore' => Helper\ServerInfoWidget::class,
            'timerWidgetPServerCore' => Helper\TimerWidget::class,
            'coinsWidgetPServerCore' => Helper\CoinsWidget::class,
            'captcha/image' => Helper\CaptchaImageReload::class, // overwrite
            'coinsInfoWidgetPServerCore' => Helper\CoinsInfoWidget::class,
            'agoTimerPServerCore' => Helper\AgoTimerWidget::class,
            'generalSettingsPServerCore' => Helper\GeneralSettings::class,
            'viewHelperExists' => Helper\ViewHelperExists::class,
            'viewCache' => Helper\ViewCache::class,
            'discordWidget' => Helper\DiscordWidget::class,
            'onlineCheckerWidget' => Helper\OnlineChecker::class,
            'translateMapping' => Helper\TranslateMapping::class,
        ],
        'factories' => [
            Helper\FormError::class => InvokableFactory::class,
            Helper\FormLabel::class => InvokableFactory::class,
            Helper\FormWidget::class => InvokableFactory::class,
            Helper\SideBarWidget::class => InvokableFactory::class,
            Helper\PlayerHistory::class => Helper\PlayerHistoryFactory::class,
            Helper\DonateSum::class => Helper\DonateSumFactory::class,
            Helper\DonateCounter::class => Helper\DonateCounterFactory::class,
            Helper\NavigationWidget::class => Helper\NavigationWidgetFactory::class,
            Helper\DateTimeFormat::class => Helper\DateTimeFormatFactory::class,
            Helper\NewsWidget::class => Helper\NewsFactory::class,
            Helper\LoggedInWidget::class => Helper\LoggedInFactory::class,
            Helper\LoginWidget::class => Helper\LoginFactory::class,
            Helper\ServerInfoWidget::class => Helper\ServerInfoFactory::class,
            Helper\TimerWidget::class => Helper\TimerFactory::class,
            Helper\CoinsWidget::class => Helper\CoinsFactory::class,
            Helper\CaptchaImageReload::class => InvokableFactory::class,
            Helper\CoinsInfoWidget::class => InvokableFactory::class,
            Helper\AgoTimerWidget::class => InvokableFactory::class,
            Helper\ViewHelperExists::class => InvokableFactory::class,
            Helper\GeneralSettings::class => Helper\GeneralSettingsFactory::class,
            Helper\ViewCache::class => Helper\ViewCacheFactory::class,
            Helper\DiscordWidget::class => Helper\DiscordWidgetFactory::class,
            Helper\OnlineChecker::class => Helper\OnlineCheckerFactory::class,
            Helper\TranslateMapping::class => Helper\TranslateMappingFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.twig',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/403' => __DIR__ . '/../view/error/403.twig',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            'email/tpl/register' => __DIR__ . '/../view/email/tpl/register.phtml',
            'email/tpl/password' => __DIR__ . '/../view/email/tpl/password.phtml',
            'email/tpl/username' => __DIR__ . '/../view/email/tpl/username.phtml',
            'email/tpl/country' => __DIR__ . '/../view/email/tpl/country.phtml',
            'email/tpl/secretLogin' => __DIR__ . '/../view/email/tpl/secret_login.phtml',
            'email/tpl/ticketAnswer' => __DIR__ . '/../view/email/tpl/ticket_answer.phtml',
            'email/tpl/ticketAdminNotification' => __DIR__ . '/../view/email/tpl/ticket_admin_notification.phtml',
            'email/tpl/addEmail' => __DIR__ . '/../view/email/tpl/add_email.phtml',
            'email/tpl/changeEmailOld' => __DIR__ . '/../view/email/tpl/change_email_old.phtml',
            'email/tpl/changeEmailNew' => __DIR__ . '/../view/email/tpl/change_email_new.phtml',
            'helper/sidebarWidget' => __DIR__ . '/../view/helper/sidebar.phtml',
            'helper/sidebarLoggedInWidget' => __DIR__ . '/../view/helper/logged-in.phtml',
            'helper/sidebarServerInfoWidget' => __DIR__ . '/../view/helper/server-info.phtml',
            'helper/formWidget' => __DIR__ . '/../view/helper/form.phtml',
            'helper/formNoLabelWidget' => __DIR__ . '/../view/helper/form-no-label.phtml',
            'helper/newsWidget' => __DIR__ . '/../view/helper/news-widget.phtml',
            'helper/sidebarTimerWidget' => __DIR__ . '/../view/helper/timer.phtml',
            'helper/playerHistory' => __DIR__ . '/../view/helper/player-history.phtml',
            'helper/sidebarLoginWidget' => __DIR__ . '/../view/helper/login-widget.phtml',
            'helper/discordWidget' => __DIR__ . '/../view/helper/discord-widget.phtml',
            'zfc-ticket-system/new' => __DIR__ . '/../view/zfc-ticket-system/ticket-system/new.twig',
            'zfc-ticket-system/view' => __DIR__ . '/../view/zfc-ticket-system/ticket-system/view.twig',
            'zfc-ticket-system/index' => __DIR__ . '/../view/zfc-ticket-system/ticket-system/index.twig',
            'small-user/login' => __DIR__ . '/../view/p-server-core/auth/login.twig',
            'small-user/logout-page' => __DIR__ . '/../view/p-server-core/auth/logout-page.twig',
            'p-server-core/paginator' => __DIR__ . '/../view/helper/paginator.phtml',
            'p-server-core/navigation' => __DIR__ . '/../view/helper/navigation.phtml',
            'p-server-core/account-navigation' => __DIR__ . '/../view/helper/account-navigation.phtml',
            'p-server-core/footer-navigation' => __DIR__ . '/../view/helper/footer-navigation.phtml',
            'helper/captcha-image-reload' => __DIR__ . '/../view/helper/captcha-image-reload.phtml',
            'helper/coins-info-widget' => __DIR__ . '/../view/helper/coins-info-widget.phtml',
        ],
        'template_path_stack' => [
            'p-server-core' => __DIR__ . '/../view',
        ],
    ],
    /**
     *  DB Connection-Setup
     */
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                // mssql db @ windows  => 'GameBackend\DBAL\Driver\PDOSqlsrv\Driver'
                // mssql db @ linux  => 'GameBackend\DBAL\Driver\PDODblib\Driver',
                'driverClass' => \Doctrine\DBAL\Driver\PDO\MySql\Driver::class,
                'params' => [
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'username',
                    'password' => 'password',
                    'dbname' => 'dbname',
                ],
                'doctrine_type_mappings' => [
                    'enum' => 'string'
                ],
            ],
            'orm_sro_account' => [
                // mssql db @ windows  => 'GameBackend\DBAL\Driver\PDOSqlsrv\Driver'
                // mssql db @ linux  => 'GameBackend\DBAL\Driver\PDODblib\Driver',
                'driverClass' => \GameBackend\DBAL\Driver\PDODblib\Driver::class,
                'params' => [
                    'host' => 'local',
                    'port' => '1433',
                    'user' => 'foo',
                    'password' => 'bar',
                    'dbname' => 'ACCOUNT',
                ],
            ],
            'orm_sro_shard' => [
                // mssql db @ windows  => 'GameBackend\DBAL\Driver\PDOSqlsrv\Driver'
                // mssql db @ linux  => 'GameBackend\DBAL\Driver\PDODblib\Driver',
                'driverClass' => \GameBackend\DBAL\Driver\PDODblib\Driver::class,
                'params' => [
                    'host' => 'local',
                    'port' => '1433',
                    'user' => 'foo',
                    'password' => 'bar',
                    'dbname' => 'SHARD',
                ],
            ],
            'orm_sro_log' => [
                // mssql db @ windows  => 'GameBackend\DBAL\Driver\PDOSqlsrv\Driver'
                // mssql db @ linux  => 'GameBackend\DBAL\Driver\PDODblib\Driver',
                'driverClass' => \GameBackend\DBAL\Driver\PDODblib\Driver::class,
                'params' => [
                    'host' => 'local',
                    'port' => '1433',
                    'user' => 'foo',
                    'password' => 'bar',
                    'dbname' => 'LOG',
                ],
            ],
        ],
        'entitymanager' => [
            'orm_default' => [
                'connection' => 'orm_default',
                'configuration' => 'orm_default'
            ],
        ],
        'driver' => [
            'application_entities' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'PServerCore\Entity' => 'application_entities',
                    'SmallUser\Entity' => null,
                    'ZfcTicketSystem\Entity' => null
                ],
            ],
        ],
    ],
    'pserver' => [
        'general' => [
            'datetime' => [
                'format' => [
                    'time' => 'Y-m-d H:i'
                ],
            ],
            'cache' => [
                'enable' => true,
            ],
            'max_player' => 1000,
            'server_name' => 'PServerCMS',
            'favicon' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAJcElEQVR4nMSafWydVRnAn/Pe23bthqtawU0CibqB2MhIZxQ/0kTRFJwCZhjrdCzqFNQ4RfiDuRCNTkPIsokG0GB0aJwyFjYYbBODLsMYRzdNZMA2FsdCGExdNrJ27e297/H3vOece9/e3s/utjzZ03Pe8/l8nec8z7nL/mVITomDYfA4eMwYedaI/MNa+Sf1I9ppY5EsjeNgxopElHlx9QL1mDLLN1XJUzeR+7a+P0N9lnX9Vs4ddJ0cf97QLnJqOJvsNdf3aTkf7GPz6+PSpicod1LdCj4OjrWAjpZDNlSClCD63xRH0UTMxxw6LqZvOfXl4yJn+N5N/4Pgb6Q1wm0JJIxAzVhkZT3msgkLOgDRBWPcAL7FOFPqLljp5/MjBZGvUF/GkD18bwGfe70YCJDFhI5ljAyAzyX2Dbb5zjh2pYodxl7D7LcxfpsyJpHMY/xHYWgQUxxm0NMI4EnzurABIxzgqziIh5VaaxKC3dmIZQAiP8f3+/nszsfSKY7P4wx4hnIP4/7EtB0wdhH1d1IfRFvH6PvrTDNint7nJJ7zVCYStfIT2r5Zb3LqXD2Ctp7g+7/iMIdQTqDZ53VQfia8Vs4vXPCbAIMNMHES3M74I5ikTp3Hn6th5hXanuf7FIvOwTLbqL9M2/9aQHtNyOY8A8G2+fxynTl/Zuwg5atqim3GCcE6k5yFd/iACoqP04zpxDQviLXdufHxaWMk8hzYkr7PrzH+NOOvZ8rpgh9vZYKpjNL3pDIFdlCcp06CAV3gXBhSh5FrORdANuNv5dgTxEaj1QYz9JBxkk5u9jq2Pmb85WmUeCMGR5CJWnBAVPYaLeQjdzWIo9t5qllgl2t4psZeXao569Vgy9RRB6yPaqYFIiT01k698Lydw+62qpSILMAtvy0wodLIp7Q5nZA+x5UgwtZvGrfOntQOIPBRcV5pEjCsHe19XrXX6bHduJPc2XraE1Di1Wwwy9L1UAEi3Mi3xvTQKzGI9jzmdIisjassSvutaEHtPVk89qU1pTGtZEA1rR7kjKnDCDiXy2pNp58Zm6RYT/FqpQks3IPbuVPd9gh41uNIPNHMpmJqgXgvsMRCzkgp3I5qzI282tZgWj3KhHI/HonFm62sRIyXyG14rcVzxJlUwK6woKTC6hoqCoQH4lWz6ptHAh1S9KR1NZ1sC/cZzsqv2qm0e3Ey8VHwoUrM+EhgO2UXZigB9axEPl5LEq6UUwiEp4nXZjUXlfgIeNb763yKuEZNNQp/4GEJdrisYPxG/EEry9jtpfJJPl66gJRyZ15KKg/npcisbwx3RzhTQeoJinM0+TImG4XEDG1qTqJaKw+w03xjizlIDoauiiv4f7/phyHi1yP+vIzbiUSkwp7kjzJwVtyZGvdMTYX4NCSmZ8rm8xGNWvmjUq0m1pb4WzlIFPupaucFKd8IMxuUwFpeJT0nfS7OFYbZdGF3voIgjLwbSf1WbTsLdvDBod7B4V1RzSUjkVV4vg2tIq4ZKFSwhCJhwDJM5Qfq+kYipz6i3I0c4m9XW5C+VeQdv4hlZpnRvV4+U8M0ccVrwC+pSz5bul820HVLNTNDyytzsTzG+eqYqs1PFaru5zPF+4mtBovhgU282XrS4xVV54hcw/ghxl/WcmqrgCk/7JWAs/I7cDDctmpnXH4bOT9L4gq5hXfNvTAyJPqMJDNjag2lB8oMvvoLyeUWFy+2x8ArjXtsmAQaUzJ8Y8Fh93QzEyVPPA0MtHrHEDCqzw4XGHn/frzVFRC8q9q5Ye3l40b+BTNL64Xi5wIR8dF1qGVHQ0GekbsgaJ1eZiEUYd5J7pkBGFpbKVj0xF8IQ5vR6h8oF7SKeCupe0mfabqMXEPjnnqa8RfgLWhnqyaUwQnoGjiANSw4QPuLNYTymbzLQH9EvadZwtMazbg7LoLmDs2pI/+KKG2R9NO5s55m/GLXQtB+JHy5SkNPvL8/dqGdXtrurzG/nT+3Iwx9Zr1Daj92TNhXUweNivU9C+I1Ro1pO5/6m0P0q1K1s41cTbmtwVziEsbto/xiYlLWaUZzIJ8CfILPF2rM72HO9xl3iPq94AfrMRJ7ZhBcF1Hy3YRFHdzsJ6OCXFF0v9Yxoyq7DklXlWgZqIZ/aZ0GskneX+p7nPUuA+/wuVc1mEvfTeBTMPZ3iF1NW59UiTrANzFuC3faSn1m4qwO09ht9g25J01FTXU1itVnFv59F4Z+2CBDCge5W77KxN1JzGVLIT3lfJa/nfLrpkHHxaCjuibLvIjpuxTIJr/f9INv1DGaSnA2T8DMRZMY0Sg2zrrdC7F8llx8UyM7F9+BjawjyboNVdmQf3hXrUsuoL6KsSv4nF1v3eCVqsB/6LxQH/zUkire7Lb0Ov177P29Kp0GnYDO/Q52/Cw2/OnELfoOfw4PU3yD8u3ISgPQA/XWrNpn5J5MRL7kB9UMUZR4Nhxi48sZ/0gjTsAfyku5a7aMWXkYDfQGXy+meBZPdBjCfiO9NHyMpvvE/VJWE1L7P8hS31Pzjb0JVzStQsaFInmXWEn47YTv1VTXNno7lxQr6zG3u0ijjyfZp2dItRR7YrzmFqPRD1FdRNNCWuZJSTFK4n7mbqLvYZ8HuXeBZhkRt3k/G6unekczDBn3snM3DP2UlOAVvXuytpQG+1fOxKz9G4KXQQjEJW7zTyp5z4TOz9jS7d4weLPYzaX3Hibe1+jblWd4DuNXc3YOI6B70Exv6GszpR+AjJm0ZRz4MjLhLCZ3SvgRqen8x0t3BGZu5vx8ks8XmmUIqm6m1EByK/Wl4OwwJjwT6W/64W0s6xnNm6KmirSoJglKL55SIheCQ5jZjlfrRYp3NvOymBL6tczbjGM4RPlz4x453hLGRCnmfJwn6VQ6eVy00j9q5W9NnZHg19MPboXg/qwswnZ/zLSBMmKbhdfAvRC5l/IAWx1FWC9BcE5TIc6GktLDOe2jXEL/0qYPey1G9PkoFyU/ad8gGhU4lz1lSHk8hfRvtdrVVT6+ZW8EwdxYcDO3+CLKr0ntoLEmlCVhGhgo8eGJeRK0/LEjaA2l3svi76J6o7goeVphWl5tUpmimsMDeJ/F2PYNMPiEyPT8ujWTz08P4d0+DkPvQ1vr+D5SKTWeCniTnllAK3tx27eipYX6f2Aof0bzwamu5035QLZ1JDa3ORAjxV1oZ5ePjvvo6KPvSvouBS+R2oLWn8mfYv5WdTD/DwAA//9ixZzg1UneMgAAAABJRU5ErkJggg==',
            'image_player' => [
                'font_color' => [
                    0,
                    0,
                    0
                ],
                'background_color' => [
                    237,
                    237,
                    237
                ],
            ],
            /**
             * send a mail to the ticket owner
             * after new entry in admin panel
             */
            'ticket_answer_mail' => false,
            /**
             * change the theme color mode
             * supported values
             * - default
             * - dark
             */
            'theme_color_mode' => 'default',
        ],
        'sliders' => [],
        'register' => [
            /**
             * role after register
             */
            'role' => 'user',
            /**
             * role after register
             */
            'role_not_active' => 'not_active',
            /**
             * is it allowed to resend the register mail as user
             */
            'resend_register_mail' => true,
            /**
             * mail confirmation after register?
             * WARNING for pw lost|country|ticket answer, we need a valid mail
             */
            'mail_confirmation' => false,
            /**
             * With that feature it is possible to add the user from the game-database to the web-database
             * Why we need a web-database with user information?
             * Easy reason the system support different games, and we have to create a central interface for the login,
             * to add roles, create a history-log, 2 pw-system and and and
             */
            'dynamic-import' => true,
            /**
             * its allowed to use more as 1 time a email-address on different accounts
             * warning it can come to duplicate emails with the dynamic import feature
             */
            'duplicate_email' => true,
            /**
             * its allowed to change mail, with confirm old mail and new mail
             */
            'allow_change_email' => false,
            /**
             * checkbox, to confirm the terms and rules and that stuff
             */
            'agree_terms' => [
                'enable' => false,
                'text' => 'I agree to the Terms of use and Rules.',
            ],
            /** new accounts should start with same password? */
            'same_password' => false,
        ],
        'ip' => [
            'mode' => 'end',
        ],
        'mail' => [
            'from' => 'abcd@example.com',
            'from_name' => 'team',
            'subject' => [
                'register' => 'RegisterMail',
                'password' => 'LostPasswordMail',
                'username' => 'LostUsernameMail',
                'country' => 'LoginIpMail',
                'secretLogin' => 'SecretLoginMail',
                'ticketAnswer' => 'TicketAnswer',
                'changeEmailOld' => 'Change E-Mail',
                'changeEmailNew' => 'Change E-Mail',
                'ticketAdminNotification' => 'TicketNotification',
            ],
            /**
             * that log each mail in the web-log
             */
            'debug' => false,
            'basic' => [
                'name' => 'localhost',
                'host' => 'smtp.example.com',
                'port' => 587,
                'connection_class' => 'login',
                'connection_config' => [
                    'username' => 'put your username',
                    'password' => 'put your password',
                    'ssl' => 'tls',
                ],
            ],
        ],
        'login' => [
            'exploit' => [
                'time' => 900, //in seconds
                'try' => 5
            ],
            /**
             * for more security we can check if the user login from a allowed country
             * WARNING YOU HAVE TO FILL THE "country_list" TABLE WITH IP COUNTRY MAPPING
             * That is the reason why its default disabled
             */
            'country_check' => false,
            /**
             * set the list of roles, which must confirm, there mail after login
             */
            'secret_login_role_list' => [],
        ],
        'password' => [
            /*
             * set other pw for web as ingame
             */
            'different_passwords' => true,
            /**
             * work with secret pw system, there is atm no admin view to handle the question =[
             */
            'secret_question' => false,
            /**
             * some games does not allowed so long password
             */
            'length' => [
                'min' => 6,
                'max' => 32
            ],
            /**
             * password must contain a number
             */
            'contains_number' => false,
            /**
             * password must contain a lower letter
             */
            'contains_lower_letter' => false,
            /**
             * password must contain a upper letter
             */
            'contains_upper_letter' => false,
            /**
             * password must contain a special char
             */
            'contains_special_char' => false,

            /**
             * password for the backend system, to white and blacklist character
             */
            'backend_character_allowed' => 'a-zA-Z0-9\!\"\§\$\%\&\/\(\)\=\?\_\:;,#',
        ],
        'validation' => [
            'username' => [
                'length' => [
                    'min' => 3,
                    'max' => 16
                ],
            ],
        ],
        'user_code' => [
            'expire' => [
                /**
                 * null means we use the general value
                 */
                'general' => 86400,
                'register' => null,
                'password' => null,
                'country' => null,
                'add_email' => null,
                'secret_login' => 60
            ]
        ],
        'news' => [
            /**
             * limit of the news entries of the first page
             */
            'limit' => 5
        ],
        'pageinfotype' => [
            'faq',
            'rules',
            'guides',
            'events'
        ],
        'blacklisted' => [
            'email' => [
                /**
                 * example to block all emails ending with @foo.com and @bar.com, the @ will added automatic
                 * 'foo.com', 'bar.com'
                 */

            ],
        ],
        'entity' => [
            'available_countries' => Entity\AvailableCountries::class,
            'country_list' => Entity\CountryList::class,
            'donate_log' => Entity\DonateLog::class,
            'download_list' => Entity\DownloadList::class,
            'ip_block' => Entity\IpBlock::class,
            'login_failed' => Entity\LoginFailed::class,
            'login_history' => Entity\LoginHistory::class,
            'logs' => Entity\Logs::class,
            'news' => Entity\News::class,
            'page_info' => Entity\PageInfo::class,
            'player_history' => Entity\PlayerHistory::class,
            'secret_answer' => Entity\SecretAnswer::class,
            'secret_question' => Entity\SecretQuestion::class,
            'server_info' => Entity\ServerInfo::class,
            'user' => Entity\User::class,
            'user_block' => Entity\UserBlock::class,
            'user_codes' => Entity\UserCodes::class,
            'user_extension' => Entity\UserExtension::class,
            'user_role' => Entity\UserRole::class,
        ],
        'payment-api' => [
            'ban-time' => '946681200',
        ],
        'guard' => [
            Guard\UserBlock::class,
            Guard\UserRefresh::class,
        ],
        'donate' => [
            'payop' => [
                'package' => [
                    /**
                    [
                    'name' => 'foobar', // name of the package
                    'price' => 1, // price in USD
                    'value' => 100, // reward in game-amount
                    ],
                     */
                ],
            ],
            'unitpay' => [
                'package' => [
                    /**
                    [
                    'name' => 'foobar', // name of the package
                    'price' => 1, // price in USD
                    'value' => 100, // reward in game-amount
                    ],
                     */
                ],
            ],
            'stripe' => [
                'package' => [
                    /**
                    [
                    'name' => 'foobar', // name of the package
                    'hash' => 'dfgdfg', // price_id from stripe
                    'value' => 100, // reward in game-amount
                    ],
                     */
                ],
            ],
        ],
        'timer' => [],
        'discord' => [
            'iframe' => '',
            'width' => '100%',
            'height' => 500,
        ],
        'ticket-system' => [
            /**
             * send a mail to admin-user list
             */
            'ticket_admin_notification' => false,
            /**
             * send a mail to followings mails
             */
            'ticket_admin_notification_mail_list' => [],
        ],
        'captcha' => [
            'type' => Service\CaptchaHandling::TYPE_IMAGE,
            'site_key' => '',
            'secret_key' => '',
            'theme' => 'light',
        ],
    ],
    'authenticationadapter' => [
        'odm_default' => [
            'objectManager' => 'doctrine.documentmanager.odm_default',
            'identityClass' => Entity\User::class,
            'identityProperty' => 'username',
            'credentialProperty' => 'password',
            'credentialCallable' => 'PServerCore\Entity\User::hashPassword'
        ],
    ],
    'small-user' => [
        'user_entity' => [
            'class' => Entity\User::class
        ],
        'login' => [
            'route' => 'PServerCore'
        ],
    ],
    'payment-api' => [
        // more config params check https://github.com/kokspflanze/PaymentAPI/blob/master/config/module.config.php
        'payment-wall' => [
            /**
             * SecretKey
             */
            'secret-key' => '',
        ],
        'super-reward' => [
            /**
             * SecretKey
             */
            'secret-key' => ''
        ],
    ],
    'zfc-ticket-system' => [
        'entity' => [
            'ticket_category' => Entity\TicketSystem\TicketCategory::class,
            'ticket_entry' => Entity\TicketSystem\TicketEntry::class,
            'ticket_subject' => Entity\TicketSystem\TicketSubject::class,
            'user' => Entity\User::class,
        ],
    ],
    'ZfcDatagrid' => [
        'settings' => [
            'export' => [
                'enabled' => false,
            ],
        ],
    ],
    'zfc-sitemap' => [
        'strategies' => [
            Listener\SitemapRemove::class,
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => Gettext::class,
                'base_dir' => __DIR__ . '/../../../languages',
                'pattern' => '%s.mo',
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            'home' => [
                'label' => 'Home',
                'route' => 'PServerCore',
                'resource' => 'PServerCore',
                'order' => -9999,
            ],
            'download' => [
                'label' => 'Download',
                'route' => 'PServerCore/site-download',
                'resource' => 'PServerCore/site-download',
                'order' => -100,
            ],
            'server-info' => [
                'label' => 'ServerInfo',
                'uri' => '#',
                'pages' => [
                    '1_position' => [
                        'label' => 'FAQ',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'faq',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                    '2_position' => [
                        'label' => 'Rules',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'rules',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                    '3_position' => [
                        'label' => 'Guides',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'guides',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                    '4_position' => [
                        'label' => 'Events',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'events',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                ],
                'order' => 0,
            ],
            'account' => [
                'id' => 'account',
                'label' => 'Account',
                'uri' => '#',
                'visible' => false,
                'pages' => [
                    'account_panel' => [
                        'label' => 'Account Panel',
                        'route' => 'PServerCore/user',
                        'resource' => 'PServerCore/user',
                        'icon' => 'fas fa-user',
                        'order' => -30,
                    ],
                    'ticket_system' => [
                        'label' => 'Ticket System',
                        'route' => 'zfc-ticketsystem',
                        'resource' => 'zfc-ticketsystem',
                        'icon' => 'fas fa-graduation-cap',
                        'order' => -20,
                        'pages' => [
                            'details' => [
                                'label' => 'Details',
                                'action' => 'view',
                                'route' => 'zfc-ticketsystem',
                                'visible' => false,
                            ],
                            'new' => [
                                'label' => 'New',
                                'action' => 'new',
                                'route' => 'zfc-ticketsystem',
                                'visible' => false,
                            ],
                        ],
                    ],
                    'donate' => [
                        'label' => 'Donate',
                        'route' => 'PServerCore/panel_donate',
                        'resource' => 'PServerCore/panel_donate',
                        'icon' => 'fas fa-dollar-sign',
                        'order' => -10,
                    ],
                    'admin_panel' => [
                        'label' => 'Admin Panel',
                        'route' => 'PServerAdmin/home',
                        'resource' => 'PServerAdmin/home',
                        'icon' => 'fas fa-graduation-cap',
                        'order' => 100,
                    ],
                ],
            ],
        ],
        'footer' => [
            'server-info' => [
                'label' => 'ServerInfo',
                'uri' => '#',
                'pages' => [
                    '1_position' => [
                        'label' => 'FAQ',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'faq',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                    '2_position' => [
                        'label' => 'Rules',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'rules',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                    '3_position' => [
                        'label' => 'Guides',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'guides',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                    '4_position' => [
                        'label' => 'Events',
                        'route' => 'PServerCore/site-detail',
                        'params' => [
                            'type' => 'events',
                        ],
                        'resource' => 'PServerCore/site-detail',
                    ],
                ],
            ],
            'policies' => [
                'label' => 'Policy',
                'uri' => '#',
                'pages' => [
                    'terms' => [
                        'label' => 'Terms & conditions',
                        'uri' => '#'
                    ],
                    'policy' => [
                        'label' => 'Privacy policy',
                        'uri' => '#'
                    ],
                ],
            ],
            'social' => [
                'label' => 'Social',
                'uri' => '#',
                'pages' => [
                    'facebook' => [
                        'label' => 'Facebook',
                        'target' => '_blank',
                        'uri' => '#'
                    ],
                    'youtube' => [
                        'label' => 'Youtube',
                        'target' => '_blank',
                        'uri' => 'https://www.youtube.com/'
                    ],
                    'github' => [
                        'label' => 'KoKsPfLaNzE',
                        'target' => '_blank',
                        'uri' => 'https://github.com/kokspflanze',
                    ],
                    'forum' => [
                        'label' => 'Forum',
                        'target' => '_blank',
                        'uri' => '#'
                    ],
                ],
            ],
        ],
    ],
];
