<?php

$displayNumberGroupStrList = ["1","2","3"];
print_r($displayNumberGroupStrList);
$displayNumberGroupList = [];
foreach ($displayNumberGroupStrList as $value) {
    $displayNumberGroupList[] = intval($value);
}
print_r($displayNumberGroupList);

print_r(strtotime("2023-01-01 08:08:00"));

$phoneDataArray = [];
for ($i=1; $i<=5; $i++){
    $phoneDataArray[] = [
        'phone' => "+86".$i,
        'associated_data' => $i
    ];
}
print_r(json_encode($phoneDataArray));

echo "\n";
print_r(time());
echo "\n";
$time = strtotime('-2 minutes');
$dateTime = date('Y-m-d H:i:s', $time);
print_r($dateTime);