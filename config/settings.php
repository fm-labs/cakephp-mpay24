<?php
return ['Settings' => [
    'Shop' => [
        'groups' => [
            'Mpay24.General' => [
                'label' => __d('shop', 'Mpay24 configuration'),
            ],
        ],
        'schema' => [
            'Mpay24.useTestSystem' => [
                'group' => 'Mpay24.General',
                'type' => 'boolean',
                'default' => false,
            ],

            'Mpay24.production.merchantId' => [
                'group' => 'Mpay24.General',
                'type' => 'string',
                'default' => '',
            ],
            'Mpay24.production.merchantPassword' => [
                'group' => 'Mpay24.General',
                'type' => 'password',
                'default' => '',
            ],
            'Mpay24.production.debug' => [
                'group' => 'Mpay24.General',
                'type' => 'boolean',
                'default' => false,
            ],
            'Mpay24.testing.merchantId' => [
                'group' => 'Mpay24.General',
                'type' => 'string',
                'default' => '',
            ],
            'Mpay24.testing.merchantPassword' => [
                'group' => 'Mpay24.General',
                'type' => 'password',
                'default' => '',
            ],
            'Mpay24.testing.debug' => [
                'group' => 'Mpay24.General',
                'type' => 'boolean',
                'default' => false,
            ],
        ],
    ],
]];
