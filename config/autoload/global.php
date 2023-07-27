<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'pserver' => [
        'general' => [
            'datetime' => [
                'format' => [
                    'time' => 'Y-m-d H:i',
                ],
            ],
            'cache' => [
                'enable' => true,
            ],
            'server_name' => 'Legends Online',
            'max_player' => 3500,
            // this is base64, to convert your icon go to https://base64.guru/converter/encode/image/ico
            'favicon' => 'data:image/png;base64,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',
            'image_player' => [
                'font_color' => [
                    0,
                    0,
                    0,
                ],
                'background_color' => [
                    237,
                    237,
                    237,
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
             * - switch (user can switch between dark and default)
             */
            'theme_color_mode' => 'switch',
        ],
        'sliders' => [
            [
                'image' => [
                    'url' => 'https://picsum.photos/1500/250',
                    'alt' => 'First',
                ],
            ],
            [
                'image' => [
                    'url' => 'https://picsum.photos/1500/250',
                    'alt' => 'Second',
                ],
            ],
        ],
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
            'same_password' => true,
        ],
        'ip' => [
            // start or end (start is for hyperfilter)
            'mode' => 'end',
        ],
        'mail' => [
            'subject' => [
                'register' => 'RegisterMail',
                'password' => 'LostPasswordMail',
                'country' => 'LoginIpMail',
                'secretLogin' => 'SecretLoginMail',
                'ticketAnswer' => 'TicketAnswer',
            ],
        ],
        'login' => [
            'exploit' => [
                'time' => 900, //in seconds
                'try' => 5,
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
            'secret_login_role_list' => [
                //'admin',
            ],
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
                'max' => 32,
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
                    'max' => 16,
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
                'secret_login' => 60,
            ],
        ],
        'news' => [
            /**
             * limit of the news entries of the first page
             */
            'limit' => 5,
        ],
        'blacklisted' => [
            'email' => [
                /**
                 * example to block all emails ending with @foo.com and @bar.com, the @ will added automatic
                 * 'foo.com', 'bar.com'
                 */
            ],
        ],
        'discord' => [
            // set your iframe url, like https://discordapp.com/widget?id=XXXXX&theme=dark
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
            'died_world_id' => 1,
        ],
        'fortress' => [
            /**
             * PServerSRO\Options\Fortress::MOD_VALID_GUILD => show all entries with a valid-guild
             * PServerSRO\Options\Fortress::MOD_ALL_ENTRIES => just show everything
             */
            'mod' => PServerSRO\Options\Fortress::MOD_VALID_GUILD,
            /**
             * list of fortress ids, which should be not visible
             */
            'disable' => [],
        ]
    ],
    'gamebackend' => [
        'general' => [
            'guild_black_list' => [],
            'character' => [
                'blocked' => true,
                'special' => true,
            ],
            //PRO FEATURE "EXEC FOO(?, ?)"
            'reward_procedure' => null,
        ],
    ],
    'slm_locale' => [
        'default' => 'en',
        'supported' => ['en', 'de'],
        'strategies' => [
            [
                'name' => SlmLocale\Strategy\AssetStrategy::class,
                'options' => [
                    'file_extensions' => [
                        'css',
                        'js',
                    ]
                ]
            ],
            [
                'name' => SlmLocale\Strategy\UriPathStrategy::class,
                'options' => [
                    'redirect_to_canonical' => false,
                    'default' => 'en',
                ],
            ],
        ],
    ],
];