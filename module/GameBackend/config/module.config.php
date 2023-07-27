<?php

use GameBackend\DBAL\Driver;
use GameBackend\DataService;
use GameBackend\Entity;
use GameBackend\Options;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'doctrine' => [
        'connection' => [
            'orm_sro_account' => [
                //windows => Driver\PDOSqlsrv\Driver::class
                'driverClass' => Driver\PDODblib\Driver::class,
                'params' => [
                    'host' => 'localhost',
                    'port' => '1433',
                    'user' => 'username',
                    'password' => 'password',
                    'dbname' => 'dbname',
                ],
            ],
            'orm_sro_shard' => [
                //windows => Driver\PDOSqlsrv\Driver::class
                'driverClass' => Driver\PDODblib\Driver::class,
                'params' => [
                    'host' => 'localhost',
                    'port' => '1433',
                    'user' => 'username',
                    'password' => 'password',
                    'dbname' => 'dbname',
                ],
            ],
            'orm_sro_log' => [
                //windows => Driver\PDOSqlsrv\Driver::class
                'driverClass' => Driver\PDODblib\Driver::class,
                'params' => [
                    'host' => 'localhost',
                    'port' => '1433',
                    'user' => 'username',
                    'password' => 'password',
                    'dbname' => 'dbname',
                ],
            ],
            'orm_metin_account' => [
                'driverClass' => Doctrine\DBAL\Driver\PDO\MySql\Driver::class,
                'params' => [
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'username',
                    'password' => 'password',
                    'dbname' => 'dbname',
                ],
            ],
        ],
        'entitymanager' => [
            'orm_sro_account' => [
                'connection' => 'orm_sro_account',
                'configuration' => 'orm_sro_account'
            ],
            'orm_sro_shard' => [
                'connection' => 'orm_sro_shard',
                'configuration' => 'orm_sro_shard'
            ],
            'orm_sro_log' => [
                'connection' => 'orm_sro_log',
                'configuration' => 'orm_sro_log'
            ],
            'orm_metin_account' => [
                'connection' => 'orm_metin_account',
                'configuration' => 'orm_metin_account'
            ],
        ],
        'configuration' => [
            'orm_sro_account' => [
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'driver' => 'sro_account_entities', // This driver will be defined later
                'generate_proxies' => true,
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'filters' => []
            ],
            'orm_sro_shard' => [
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'driver' => 'sro_shard_entities', // This driver will be defined later
                'generate_proxies' => true,
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'filters' => []
            ],
            'orm_sro_log' => [
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'driver' => 'sro_log_entities', // This driver will be defined later
                'generate_proxies' => true,
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'filters' => []
            ],
            'orm_metin_account' => [
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'driver' => 'metin_account_entities', // This driver will be defined later
                'generate_proxies' => true,
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'filters' => []
            ],
        ],
        'driver' => [
            'sro_account_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity/SRO/Account']
            ],
            'sro_shard_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity/SRO/Shard']
            ],
            'sro_log_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity/SRO/Log']
            ],
            'metin_account_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity/Metin/Account']
            ],
            'orm_sro_account' => [
                'drivers' => [
                    'GameBackend\Entity\SRO\Account' => 'sro_account_entities'
                ],
            ],
            'orm_sro_shard' => [
                'drivers' => [
                    'GameBackend\Entity\SRO\Shard' => 'sro_shard_entities'
                ],
            ],
            'orm_sro_log' => [
                'drivers' => [
                    'GameBackend\Entity\SRO\Log' => 'sro_log_entities'
                ],
            ],
            'orm_metin_account' => [
                'drivers' => [
                    'GameBackend\Entity\Metin\Account' => 'metin_account_entities'
                ],
            ],
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'gamebackend_dataservice' => DataService\Mocking::class,
            'gamebackend_cross_fire_options' => Options\CrossFireOptions::class,
            'gamebackend_sro_options' => Options\SroOptions::class,
            'gamebackend_metin_options' => Options\MetinOptions::class,
            'gamebackend_general_options' => Options\GeneralOptions::class,
        ],
        'factories' => [
            DataService\Mocking::class => DataService\MockingFactory::class,
            DataService\SRO::class => DataService\SROFactory::class,
            DataService\CrossFire::class => DataService\CrossFireFactory::class,
            DataService\Metin::class => DataService\MetinFactory::class,
            Options\CrossFireOptions::class => Options\CrossFireFactory::class,
            Options\SroOptions::class => Options\SroFactory::class,
            Options\MetinOptions::class => Options\MetinFactory::class,
            Options\GeneralOptions::class => Options\GeneralFactory::class,
            'gamebackend_caching_service' => \GameBackend\Service\CacheFactory::class
        ],
    ],
    'gamebackend' => [
        'general' => [
            'guild_black_list' => [],
            'character' => [
                'blocked' => true,
                'special' => true
            ],
            'reward_procedure' => null,
        ],
        'sro' => [
            'entity_account_blocked_user' => Entity\SRO\Account\BlockedUser::class,
            'entity_account_punishment' => Entity\SRO\Account\Punishment::class,
            'entity_account_sk_silk' => Entity\SRO\Account\SkSilk::class,
            'entity_account_sk_silk_buy_list' => Entity\SRO\Account\SkSilkBuyList::class,
            'entity_account_sk_silk_change_by_web' => Entity\SRO\Account\SkSilkChangeByWeb::class,
            'entity_account_smc_log' => Entity\SRO\Account\SmcLog::class,
            'entity_account_tb_user' => Entity\SRO\Account\TbUser::class,
            'entity_log_online_offline' => Entity\SRO\Log\OnlineOffline::class,
            'entity_log_log_event_char' => Entity\SRO\Log\LogEventChar::class,
            'entity_log_log_event_item' => Entity\SRO\Log\LogEventItem::class,
            'entity_shard_binding_item' => Entity\SRO\Shard\BindingOptionWithItem::class,
            'entity_shard_character' => Entity\SRO\Shard\Character::class,
            'entity_shard_guild' => Entity\SRO\Shard\Guild::class,
            'entity_shard_guild_member' => Entity\SRO\Shard\GuildMember::class,
            'entity_shard_alliance' => Entity\SRO\Shard\Alliance::class,
            'entity_shard_inventory' => Entity\SRO\Shard\Inventory::class,
            'entity_shard_inventory_for_avatar' => Entity\SRO\Shard\InventoryForAvatar::class,
            'entity_shard_item' => Entity\SRO\Shard\Item::class,
            'entity_shard_ref_item' => Entity\SRO\Shard\RefItem::class,
            'entity_shard_ref_magic_opt' => Entity\SRO\Shard\RefMagicOpt::class,
            'entity_shard_siege_fortress' => Entity\SRO\Shard\SiegeFortress::class,
            'entity_shard_user' => Entity\SRO\Shard\User::class,
            'entity_shard_char_tri_job' => Entity\SRO\Shard\CharTriJob::class,
            'entity_shard_char_nick_name_list' => Entity\SRO\Shard\CharNickNameList::class,
            'entity_shard_training_camp' => Entity\SRO\Shard\TrainingCamp::class,
            'entity_shard_training_camp_honor_ranking' => Entity\SRO\Shard\TrainingCampHonorRank::class,
            'entity_shard_training_camp_member' => Entity\SRO\Shard\TrainingCampMember::class,
            'entity_shard_timed_job' => Entity\SRO\Shard\TimedJob::class,
        ],
        'cross_fire' => [
            'entity_member_class' => Entity\CrossFire\Member::class,
            'entity_character_class' => Entity\CrossFire\Character::class,
            'entity_billing_class' => Entity\CrossFire\Billing::class,
            'entity_connections_class' => Entity\CrossFire\MinCu::class,
        ],
        'metin' => [
            'entity_account_class' => Entity\Metin\Account\Account::class,
        ],
    ],
];
