<?php

namespace PServerCMS\SROItemPoints;

return [
    'doctrine' => [
        'driver' => [
            'sro_shard_entities' => [
                'paths' => [__DIR__ . '/../src/EntityShard']
            ],
        ],
    ],
    'gamebackend' => [
        'sro' => [
            'entity_shard_alliance' => EntityShard\Alliance::class,
            'entity_shard_character' => EntityShard\Character::class,
            'entity_shard_guild' => EntityShard\Guild::class,
            'entity_shard_guild_member' => EntityShard\GuildMember::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'SROItemPoints' => __DIR__ . '/../view',
        ],
    ],
];