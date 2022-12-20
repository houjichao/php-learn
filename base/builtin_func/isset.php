<?php
$data = [
    'contributor' => '1111',
    ];

if (!isset($data['leadPeriodTime'])) {
    echo "alsjdlajdlajd";
}

$taskExpireTime = '(taskExpireTime IS NULL' . ' OR ' . ' taskExpireTime >= "' . date('Y-m-d H:i:s') . '")';
$where[$taskExpireTime] = null;
foreach ($where as $key => $item) {
    echo $key.$item;
}


$taskExpireTime = $lead['leadPeriodTime'] ?? null;
echo "\n";
var_dump($taskExpireTime);
echo $taskExpireTime . "-----";

$arr =  array(0,1);
var_dump($arr);
echo "$$$$$$$$$$$\n";
echo implode(",",$arr);
