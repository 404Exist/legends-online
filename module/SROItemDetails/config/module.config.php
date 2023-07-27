<?php

use SROItemDetails\Item;
use SROItemDetails\Entity\Shard;
use SROItemDetails\View\Helper;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'view_manager' => [
        'template_map' => [
            'helper/pServerRankingItemDetails' => __DIR__ . '/../view/helper/item-details.phtml',
            'helper/sroItemDetailsBluesWhites' => __DIR__ . '/../view/helper/item-blues-whites.phtml',
            'helper/pServerRankingInventoryView' => __DIR__ . '/../view/helper/inventory-view.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'sro_item_details_item_data' => Item\ItemData::class,
            'sro_item_details_property_white' => Item\Properties\Whites::class,
            'sro_item_details_property_blues' => Item\Properties\Blues::class,
            'sro_item_details_blues_id_mapping' => Item\Properties\Blues\IdMapping::class,
        ],
        'factories' => [
            Item\ItemData::class => Item\ItemDataFactory::class,
            Item\Properties\Blues::class => Item\Properties\BluesFactory::class,
            Item\Properties\Blues\IdMapping::class => Item\Properties\Blues\IdMappingFactory::class,
            Item\Properties\Whites::class => Item\Properties\WhitesFactory::class,
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'sroItemDetailsBluesWhites' => Helper\BluesWhites::class
        ],
        'factories' => [
            Helper\BluesWhites::class => Helper\BluesWhitesFactory::class,
        ],
    ],
    'gamebackend' => [
        'sro' => [
            'entity_shard_inventory' => Shard\Inventory::class,
            'entity_shard_item' => Shard\Item::class,
            'entity_shard_ref_item' => Shard\RefItem::class,
            'entity_shard_inventory_for_avatar' => Shard\InventoryForAvatar::class,
        ],
    ],
];