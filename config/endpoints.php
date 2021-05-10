<?php

return [
    [
        'url' => '/api/user',
        'method' => 'GET',
        'params' => [],
        'query_params' => [],
        'oauth' => true,
        'description' => 'Get current user',
    ],
    [
        'url' => '/api/payload',
        'method' => 'POST',
        'params' => [],
        'query_params' => [],
        'oauth' => true,
        'description' => 'Save payload. Send hexadecimal in the content of the request',
    ],
    [
        'url' => '/api/payload',
        'method' => 'GET',
        'params' => [],
        'query_params' => [
            'sort' => [
                'asc' => [
                    'lat',
                    'lng',
                    'from',
                    'origin',
                    'address',
                    'created_at',
                ],
                'desc' => [
                    '-lat',
                    '-lng',
                    '-from',
                    '-origin',
                    '-address',
                    '-created_at',
                ],
                'example' => [
                    '?sort=lat',
                    '?sort=-lat',
                ],
            ],
            'filter' => [
                'created_at',
                'created_at_between',
                'example' => [
                    '?filter[created_at_between]=2021-05-09,2021-05-10',
                ],
            ]
        ],
        'oauth' => true,
        'description' => 'List payloads paginate.',
    ],
];
