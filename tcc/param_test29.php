<?php

include "common_util.php";

$cids = ["111","2222","123io1u293812"];
$rates = [10001 => 10, 10002 => 20];
foreach ($cids as $cid) {
    $assignSale = CommonUtil::getHitProbabilityKey($rates);
    $assignMap[$assignSale][] = $cid;
}
var_dump($assignMap);