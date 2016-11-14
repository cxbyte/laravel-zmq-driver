<?php

return [
    'connections' => [
        'zmq' => [
            'driver' => 'zmq',
            'port' => env('BROADCAST_ZMQ_PORT', '5555')
        ]
    ]
];
