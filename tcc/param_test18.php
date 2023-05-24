<?php

list($micro_seconds, $seconds) = explode(" ", microtime());
$startTime =  ((float)$micro_seconds + (float)$seconds);

sleep(5);

list($micro_seconds, $seconds) = explode(" ", microtime());
$endTime =  ((float)$micro_seconds + (float)$seconds);

$costTime = ($endTime - $startTime) * 1000;

echo $costTime;