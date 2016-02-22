<?php
return [
    'standard' => [
        'type' => 1,
        'ruleName' => 'userRole',
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'standard',
        ],
    ],
];
