<?php

return [

    'product' => [

        'name'        => '商品名',
        'description' => '商品説明',

        'images'         => '商品画像',
        'add_image_url'  => '画像をURLから追加',
        'add_image_file' => '画像を追加',

        'pricing'         => '価格',
        'price'           => '販売価格',
        'reference_price' => '参考価格',
        'taxes_included'  => '税込み価格',

        'inventory'               => '在庫',
        'sku'                     => 'SKU （単品管理）',
        'barcode'                 => 'バーコード (ISBN, UPC, GTIN, etc.)',
        'inventory_policy'        => '在庫管理',
        'dont_track_inventory'    => '在庫数を追跡しない',
        'glitter_track_inventory' => 'Glitterで在庫数を管理する',
        'quantity'                => '在庫数',
        'out_of_stock_purchase'   => '在庫切れの状態でもお客様による購入を可能にする',

        'shipping'          => '配送',
        'requires_shipping' => 'この商品は配送が必要',

        'weight'              => '重量',
        'weight_description'  => '購入時にお客様の配送料金を計算するために使用されます。',
        'fulfillment_service' => '配送業者',
        'fulfillment_manual'  => '自分で配送',

        'variants'             => 'バリエーション',
        'variants_description' => 'この商品がサイズや色が異なる複数のバリエーションで提供されている場合は、バリエーションを追加してください。',
        'reorder_variants'     => '並び替え',
        'edit_options'         => 'オプションを編集',
        'add_variant'          => 'バリエーションを追加',

    ],

    'save' => [
        'success' => '保存しました！',
    ],

];