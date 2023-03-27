<?php
return ['Settings' => [
    'Shop' => [
        'groups' => [
            'Mpay24.General' => [
                'label' => __d('shop', 'Mpay24 configuration'),
            ],
            'Mpay24.Production' => [
                'label' => __d('shop', 'Mpay24 Live configuration'),
            ],
            'Mpay24.Testing' => [
                'label' => __d('shop', 'Mpay24 Test configuration'),
            ],
        ],
        'schema' => [
            // production
            'Mpay24.production.merchantId' => [
                'group' => 'Mpay24.Production',
                'type' => 'string',
                'default' => '',
            ],
            'Mpay24.production.merchantPassword' => [
                'group' => 'Mpay24.Production',
                'type' => 'password',
                'default' => '',
            ],
//            'Mpay24.production.useTestSystem' => [
//                'group' => 'Mpay24.Production',
//                'type' => 'boolean',
//                'default' => true,
//                'help' => __('This MUST be UNCHECKED!')
//            ],
            'Mpay24.production.debug' => [
                'group' => 'Mpay24.Production',
                'type' => 'boolean',
                'default' => false,
            ],

            // testing
            'Mpay24.testing.merchantId' => [
                'group' => 'Mpay24.Testing',
                'type' => 'string',
                'default' => '',
            ],
            'Mpay24.testing.merchantPassword' => [
                'group' => 'Mpay24.Testing',
                'type' => 'password',
                'default' => '',
            ],
            'Mpay24.testing.useTestSystem' => [
                'group' => 'Mpay24.Testing',
                'type' => 'boolean',
                'default' => false,
                'help' => __('This MUST be CHECKED!')
            ],
            'Mpay24.testing.debug' => [
                'group' => 'Mpay24.Testing',
                'type' => 'boolean',
                'default' => false,
            ],
        ],
    ],
]];
