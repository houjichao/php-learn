<?php

$str = "[{\"id\":10000,\"robotTaskId\":10003,\"belongModule\":7,\"cid\":\"dac7ced02e10b365e06cdeccec00be99\",\"phone\":\"13099260027\",\"status\":0,\"createTime\":\"2023-05-09 20:29:50\",\"pushTime\":\"0000-00-00 00:00:00\"},{\"id\":10000,\"robotTaskId\":10003,\"belongModule\":7,\"cid\":\"dac7ced02e10b365e06cdeccec00be99\",\"phone\":\"13099260028\",\"status\":0,\"createTime\":\"2023-05-09 20:29:50\",\"pushTime\":\"0000-00-00 00:00:00\"}]";
$arr = json_decode($str,true);
$arr1 = array_chunk($arr, 1, true);
$pushOriginal = array_column($arr1[1], null, 'phone');
foreach ($arr1 as $arr) {
    foreach ($arr as $item) {
        print_r($item['phone']);
    }
}
//var_dump($pushOriginal);

