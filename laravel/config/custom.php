<?php

return [
    "page" => [
        "perPage" => env('PER_PAGE', 20),
    ],
    "konnektive" => [
        "loginId" => env('KONNEKTIVE_LOGIN_ID', 'Oleg'),
        "password" => env('KONNEKTIVE_PASSWORD', 'test****'),
        "product1_qty" => env('KONNEKTIVE_PRODUCT_QTY', '1'),
        "order_import" => env('KONNEKTIVE_ORDER_IMPORT_URL', 'https://api.konnektive.com/order/import/'),
        "purchase_query" => env('KONNEKTIVE_PURCHARGE_QUERY_URL', 'https://api.konnektive.com/purchase/query/'),
        'order_cancel' => env('KONNEKTIVE_ORDER_CANCEL_URL', 'https://api.konnektive.com/order/cancel/'),
    ],
];
