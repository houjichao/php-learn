<?php


$str = "[{\"id\":14,\"uin\":\"100000006250\",\"black_list_type\":1,\"telephone\":\"*******9457\",\"apply_for\":\"TCC_CHANNEL\",\"creator\":\"tinaynliu\",\"updator\":\"tinaynliu\",\"create_time\":\"2021-10-28 18:57:55\",\"update_time\":\"2021-10-28 18:57:55\",\"reason\":\"\"},{\"id\":14,\"uin\":\"100000006250\",\"black_list_type\":1,\"telephone\":\"*******9457\",\"apply_for\":\"TCC_CHANNEL\",\"creator\":\"tinaynliu\",\"updator\":\"tinaynliu\",\"create_time\":\"2021-10-28 18:57:55\",\"update_time\":\"2021-10-28 18:57:55\",\"reason\":\"\"}]";
$phoneBlackList = json_decode($str, true);
$phoneBlackMap = array_column($phoneBlackList, 'telephone');

print_r($phoneBlackMap);