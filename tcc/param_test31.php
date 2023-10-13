<?php

$str = "[{\"key\": \"campaign_name\", \"keyName\": \"更多信息1\", \"keyValue\": \"【海纳】新形势下的智慧社区治理\"}, {\"key\": \"comment\", \"keyName\": \"更多信息1\", \"keyValue\": null}, {\"key\": \"crm_activity_id\", \"keyName\": \"更多信息1\", \"keyValue\": \"2020031201\"}, {\"key\": \"member_id\", \"keyName\": \"更多信息1\", \"keyValue\": \"1203912204075662\"}, {\"key\": \"need_clean\", \"keyName\": \"更多信息1\", \"keyValue\": 1}, {\"key\": \"tssId\", \"keyName\": \"tssId\", \"keyValue\": \"882048982\"}]";

$extend = json_decode($str, true);
$newExtend = [];
foreach ($extend as $extendInfo) {
    $extendInfo['keyValue'] = strval($extendInfo['keyValue']);
    $newExtend[] = $extendInfo;
}

print_r(json_encode($newExtend));