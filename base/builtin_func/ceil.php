<?php


print_r(ceil(123 / 50));

echo strlen(uniqid()) . '\n';

echo strlen("dac7ced02e10b365e06cdeccec00be99");


$uuid = uniqid('', true);
$uuid .= random_bytes(16);
$uuid = md5($uuid);
$uuid = substr($uuid, 0, 8) . '-' .
    substr($uuid, 8, 4) . '-' .
    substr($uuid, 12, 4) . '-' .
    substr($uuid, 16, 4) . '-' .
    substr($uuid, 20, 12);
echo $uuid;

echo "\n";

$customerScore = [["customer_score_file_id" => "1111"]];
$qidianParams = [
    'kfext' => "2222",
    'task_type' => 4,
    'task_id' => "3333",
    'customer_list' => [
        'type' => 3,
        'customer_score' => $customerScore
    ]
];

print_r(json_encode($qidianParams));
