<?php

$assignParams = [
    'salesNames' => [
        '',
    ],
    'ifAssignToOfflineSales' => 1,
    'salesName' => 'system',
    'belongModule' => '',
    'remark' => '自动撞单分配',
    'taskName' => '自动撞单分配',
    'forceAssign' => 1,
    'generateTaskTag' => false,
];
$generateTaskTag = true;
var_dump($assignParams['generateTaskTag']);
var_dump(isset($assignParams['generateTaskTag']));
if (isset($assignParams['generateTaskTag'])) {
    $generateTaskTag = $assignParams['generateTaskTag'];
}
var_dump($generateTaskTag);