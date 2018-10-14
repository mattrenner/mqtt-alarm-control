<?php

return [
    'alarm' => [

        // e.g. tcp://192.168.1.10:900

      'url' => getenv('ALARM_URL'),

    ],

    'broker' => [

        // e.g. tcp://192.168.1.10:900

        'url' => getenv('BROKER_URL')

    ]
];