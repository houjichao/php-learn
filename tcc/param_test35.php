<?php

const FOLLOW_TYPE = [
    0 => '无',
    1 => '电话',
    2 => '短信',
    3 => '邮件',
    4 => 'IM',
    5 => '其他',
    6 => '微信',
    7 => 'QQ',
];

$followType = [];
//十进制转化二进制并转化为数组并反转数组
$decBinList = array_reverse(str_split(decbin(33)));
foreach ($decBinList as $key => $value) {
    if ($value != 1) {
        continue;
    }
    $followType[] = FOLLOW_TYPE[$key + 1] ?? '';
}

print_r($followType);