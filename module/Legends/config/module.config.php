<?php
/**
 * @author     m1xawy
 * @date       9 Apr 2023
 * @for        Legends
 * @contact    FB:@m1xawy | Dis:m1xawy#9363
 */
return [
    'view_manager' => [
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.twig',
            //'p-server-core/index/index' => __DIR__ . '/../view/p-server-core/index/index.twig',
            //'p-server-core/site/download' => __DIR__ . '/../view/p-server-core/site/download.twig',
            //'small-user/login' => __DIR__ . '/../view/p-server-core/auth/login.twig',

            //'helper/sidebarWidget' => __DIR__ . '/../view/helper/sidebar.phtml',
            'helper/sidebarLoggedInWidget' => __DIR__ . '/../view/helper/logged-in.phtml',
            'helper/sidebarServerInfoWidget' => __DIR__ . '/../view/helper/server-info.phtml',
            'helper/sidebarTimerWidget' => __DIR__ . '/../view/helper/timer.phtml',

            'p-server-sro/fortress' => __DIR__ . '/../view/helper/fortress.phtml',
            'p-server-sro-unique/unique-kill-list' => __DIR__ . '/../view/helper/unique-kill-list.phtml',

            //'p-server-cms/pvp-kill-history-widget' => __DIR__ . '/../view/helper/pvp-kill-history-widget.phtml',
            //'p-server-cms/job-kill-history-widget' => __DIR__ . '/../view/helper/job-kill-history-widget.phtml',
            //'p-server-cms/pvp-kill-history' => __DIR__ . '/../view/helper/pvp-kill-history.phtml',
            //'p-server-cms/job-kill-history' => __DIR__ . '/../view/helper/job-kill-history.phtml',

            //'p-server-sro-unique/killhistory-character' => __DIR__ . '/../view/helper/killhistory-character.phtml',
            //'p-server-sro-unique/character-each-unique-points' => __DIR__ . '/../view/helper/character-each-unique-points.phtml',

            'helper/playerHistory' => __DIR__ . '/../view/helper/player-history.phtml',
            //'helper/sidebarLoginWidget' => __DIR__ . '/../view/helper/login-widget.phtml',
            //'helper/discordWidget' => __DIR__ . '/../view/helper/discord-widget.phtml',
            //'p-server-core/paginator' => __DIR__ . '/../view/helper/paginator.phtml',
            //'p-server-core/navigation' => __DIR__ . '/../view/helper/navigation.phtml',
            //'p-server-core/account-navigation' => __DIR__ . '/../view/helper/account-navigation.phtml',
            //'p-server-core/footer-navigation' => __DIR__ . '/../view/helper/footer-navigation.phtml',
            //'helper/coins-info-widget' => __DIR__ . '/../view/helper/coins-info-widget.phtml',

            'helper/topCharacterWidget' => __DIR__ . '/../view/helper/top-character.phtml',
            'helper/topGuildWidget' => __DIR__ . '/../view/helper/top-guild.phtml',

        ],
        'template_path_stack' => [
            'legends' => __DIR__ . '/../view',
        ],
    ],
];