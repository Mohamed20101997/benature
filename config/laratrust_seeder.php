<?php

return [
    'role_structure' => [
        'super_admin' => [
            'admins' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
            'shippings' => 'c,r,u,d',
            'taxes' => 'c,r,u,d',
            'brands' => 'c,r,u,d',
            'material' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'settings' => 'c,r,u',
            'question' => 'c,r,u,d',
            'messages' => 'r,d',
        ],

        'admin' => []
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
