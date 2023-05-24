<?php

$str = "{\"AQHM3        6C2hFiHoFw0j+QJt4HQ\":{\"robotTaskId\":10003,\"belongModule\":7,\"cid\":\"dac7ced02e10b365e06cdeccec00be99\",\"phone\":\"AQHM36C2hFiHoFw0j+QJt4H        Q\",\"status\":0,\"createTime\":\"2023-05-09 20:17:03\"}}";
$arr = json_decode($str);

$batchInsertDataDb = [];
foreach ($arr as $item) {
    $batchInsertDataDb[] = $item;
}
//print_r(json_encode($batchInsertDataDb));

$str = "[{\"id\":\"500\",\"name\":\"腾讯会议\"},{\"id\":\"631\",\"name\":\"上海自营backup\"},{\"id\":\"632\",\"name\":\"安畅backup\"},{\"id\":\"633\",\"name\":\"忆享backup\"},{\"id\":\"670\",\"name\":\"忆享招聘\"},{\"id\":\"676\",\"name\":\"忆享所属地外呼\"},{\"id\":\"682\",\"name\":\"安畅被叫所属地外        呼\"},{\"id\":\"690\",\"name\":\"安畅所属地外呼备选\"},{\"id\":\"691\",\"name\":\"忆享所属5730外呼备选\"},{\"id\":\"766\",\"name\":\"忆享手机呼入\"},{\"id\":\"779\",\"name\":\"上海自      25手机呼入\"},{\"id\":\"793\",\"name\":\"安畅手机呼入\"},{\"id\":\"902\",\"name\":\"上海自营        手机外呼\"},{\"id\":\"919\",\"name\":\"上海SaaS手机外呼\"},{\"id\":\"937\",\"name\":\"安畅手g      3a外呼\"},{\"id\":\"956\",\"name\":\"忆享手机外呼\"},{\"id\":\"1029\",\"name\":\"忆享被标记\"},{\"        id\":\"4693\",\"name\":\"上海saas，ABCDE\"},{\"id\":\"4695\",\"name\":\"云售后\"},{\"id\":\"13804\",\"name\":\"语音机u5668人专用\"}]";
var_dump(array_unique(array_filter(array_column(json_decode($str), 'id'))));