<?php

$cache = false;

return [
    // This should be an array of module namespaces used in the p-server-cms.
    'modules' => [
        'Laminas\Cache',
        'Laminas\Cache\Storage\Adapter\Filesystem',
        'Laminas\Cache\Storage\Adapter\Memory',
        'Laminas\I18n',
        'Laminas\Mail',
        'Laminas\Router',
        'Laminas\Validator',
        'Laminas\InputFilter',
        'Laminas\Form',
        'Laminas\Session',
        'Laminas\Mvc\Console',
        'Laminas\Navigation',
        'Laminas\Mvc\Plugin\FlashMessenger',
        'Laminas\Mvc\Plugin\Identity',
        'Laminas\DeveloperTools',
        'SlmLocale',
        'ZfcTwig',
        'DoctrineModule',
        'DoctrineORMModule',
        'PDODblibModule',
        'BjyAuthorize',
        'GameBackend',
        'ZfcTicketSystem',
        'ZfcBBCode',
        'PaymentAPI',
        'SanCaptcha',
        'ZfcDatagrid',
        'ZfcSitemap',
        'SmallUser',
        'PServerCore',
        'PServerAdmin',
        'PServerAdminStatistic',
        'PServerRanking',
        'PServerPanel',
        'PServerCLI',
        'PServerSRO',
        'PServerCMS\SROUnique',
        'PServerCMS\SROItemPoints',
        //'PServerCMS\SROKill',
        'SROItemDetails',
        //'PServerCMS\DonateAction',

        // for other ranking view, works only with 'PServerCMS\SROItemPoints'
        'PServerCMS\RankingMain',

        'Customize', // hint your custom modules should be on the last position
        'Legends', //theme
    ],

    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [
        // This should be an array of paths in which modules reside.
        // If a string key is provided, the listener will consider that a module
        // namespace, the value of that key the specific path to that module's
        // Module class.
        'module_paths' => [
            './module',
            './vendor',
        ],

        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths' => [
            'config/autoload/{,*.}{global,local}.php',
        ],

        // Whether or not to enable a configuration cache.
        // If enabled, the merged configuration will be cached and used in
        // subsequent requests.
        'config_cache_enabled' => $cache,

        // The key used to create the configuration cache file name.
        'config_cache_key' => 'pserver_config',

        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        'module_map_cache_enabled' => $cache,

        // The key used to create the class map cache file name.
        'module_map_cache_key' => 'pserver',

        // The path in which to cache merged configuration.
        'cache_dir' => __DIR__ . '/../data',

        // Whether or not to enable modules dependency checking.
        // Enabled by default, prevents usage of modules that depend on other modules
        // that weren't loaded.
         'check_dependencies' => true,
    ],

    // Used to create an own service manager. May contain one or more child arrays.
    //'service_listener_options' => [
    //     [
    //         'service_manager' => $stringServiceManagerName,
    //         'config_key'      => $stringConfigKey,
    //         'interface'       => $stringOptionalInterface,
    //         'method'          => $stringRequiredMethodName,
    //     ],
    // ]

   // Initial configuration with which to seed the ServiceManager.
   // Should be compatible with Laminas\ServiceManager\Config.
   // 'service_manager' => [],
];
