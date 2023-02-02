<?php
require "string_util.php";

$response['Data']['Tickets'] = json_decode("[{\"Status\":10,\"CurrentOperator\":\"lucy\",\"ServiceSceneChecked\":1,\"Title\":\"云服务器登录不上\",\"URL\":\"http://abc.c\",\"CcPerson\":\"ucy,luke,wang\",\"Responsible\":\"lucy\",\"ExternStatusDisplay\":\"处理中\",\"CloseTime\":\"2022-10-22 10:37:11\",\"IncidentManager\":\"lucy\",\"ServiceChannel\":10,\"ServiceChannelDisplay\":\"PCLOUD\",\"ExternStatus\":0,\"Operator\":\"lucy,luke,wang\",\"ServiceSceneDisplay\":\"服务器/云服务器\",\"QcloudCategoryDisplay\":\"服务器/云服务\",\"QcloudCategoryId\":1,\"KeyStroke\":\"abc/cde\",\"CreateTime\":\"2022-10-22 10:37:11\",\"StatusDisplay\":\"处理中\"},{\"Status\":10,\"CurrentOperator\":\"lucy\",\"ServiceSceneChecked\":1,\"Title\":\"云服务器登录不上\",\"URL\":\"http://abc.c\",\"CcPerson\":\"ucy,luke,wang\",\"Responsible\":\"lucy\",\"ExternStatusDisplay\":\"处理中\",\"CloseTime\":\"2022-10-22 10:37:11\",\"IncidentManager\":\"lucy\",\"ServiceChannel\":10,\"ServiceChannelDisplay\":\"PCLOUD\",\"ExternStatus\":0,\"Operator\":\"lucy,luke,wang\",\"ServiceSceneDisplay\":\"服务器/云服务器\",\"QcloudCategoryDisplay\":\"服务器/云服务\",\"QcloudCategoryId\":1,\"KeyStroke\":\"abc/cde\",\"CreateTime\":\"2022-10-22 10:37:11\",\"StatusDisplay\":\"处理中\"}]");


$data= [];
$i = 0;
foreach ($response['Data']['Tickets'] as $ticket) {
    $temp = [];
    foreach ($ticket as $key => $value) {
        $temp[StringUtil::convertUnderline($key, false)] = $value;
    }
    $data[$i] = $temp;
    $i++;
}

echo(json_encode($data));
