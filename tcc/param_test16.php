<?php

$json = "{\"version\":1,\"componentName\":\"tcc-web\",\"eventId\":\"1681367243592.0.5688543864202422\",\"returnCode\":999,\"returnValue\":1,\"returnMessage\":\"no token\",\"data\":null}";
$result = json_decode($json,true);
var_dump($result['code'] != 0);