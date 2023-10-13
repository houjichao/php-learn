<?php

date_default_timezone_set("PRC");


$createdTimestamp = strtotime("2023-09-20 17:23:22");
echo $createdTimestamp;
echo "\n";
$currentTimestamp = time();
echo $currentTimestamp;
echo "\n";
$difference = $currentTimestamp - $createdTimestamp;
echo $difference;