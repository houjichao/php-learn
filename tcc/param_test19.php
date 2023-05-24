<?php

var_dump(empty(1));

$batchInsertData = [];
if (!empty(1)) {
    for ($i=1; $i<=5; $i++) {
        $batchInsertData[] = [
            'robotTaskId' => 111,
            'belongModule' => 7,
            'cid' => 111 . $i,
            'phone' => "1309926002". $i,
            'status' => 1,
            'createTime' => date('Y-m-d H:i:s'),
        ];
    }
    $batchInsertData[] = [
        'robotTaskId' => 111,
        'belongModule' => 7,
        'cid' => 1111,
        'phone' => "13099260023",
        'status' => 1,
        'createTime' => date('Y-m-d H:i:s'),
    ];
}

$item=array();
foreach($batchInsertData as $k=>$v){
    if(!isset($item[$v['phone']])) {
        $item[$v['phone']]=$v;
    }
}
#print_r(array_values($item));
#var_dump(sizeof($item));
var_dump(sizeof($batchInsertData));
$filterCidNum = 0;
if (!empty($batchInsertData)) {
    $batchInsertData=  array_column($batchInsertData, null,'cid');
    $filterCidNum = sizeof($batchInsertData);
    print_r($filterCidNum);
}
print_r($filterCidNum);

$chunk_result=array_chunk($batchInsertData,3);
#var_dump($chunk_result);

foreach ($chunk_result as $result) {
    foreach ($result as $value) {
        var_dump($value['phone']);
    }
}