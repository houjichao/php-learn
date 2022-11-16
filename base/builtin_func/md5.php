<?php

$params = array("follower"=>"侯吉超");

$notifyDataStr = "";
if (isset($params['leadId'])) {
    $notifyDataStr = $notifyDataStr . $params['leadId'];
}
if (isset($params['ruleId'])) {
    $notifyDataStr = $notifyDataStr . $params['ruleId'];
}
if (isset($params['cid'])) {
    $notifyDataStr = $notifyDataStr . $params['cid'];
}
if (isset($params['follower'])) {
    $notifyDataStr = $notifyDataStr . $params['follower'];
}
echo $notifyDataStr;
echo "\n";

echo md5($notifyDataStr);