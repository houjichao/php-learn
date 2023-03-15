<?php

$where['valid'] = 1;

$fieldData = [
    'status' => [
        'content' => 0,
        'search_type' => 'equal',
    ],
];

array_walk($where, function ($v, $k) use (&$fieldData) {
    $fieldData[$k] = [
        'content' => $v,
        'search_type' => 'equal',
    ];
});