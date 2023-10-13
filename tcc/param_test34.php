<?php

$SMS_PARAMS = ['name', 'phone', 'qq', 'weworkShortChain'];

$resultMap = [];
if (count(explode('$', $str)) > 0 && strpos($str, '$') !== false) {
    $strMap = explode('$', $str);
    foreach ($strMap as $str) {
        preg_match_all("/(?:\{)(.*)(?:\})/i", $str, $ret);
        if (!isset($ret[1][0]) || empty($ret[1][0])) {
            continue;
        }
        $resultMap[] = $ret[1][0];
    }
    $resultMap = array_filter($resultMap, function ($v) use ($SMS_PARAMS) {
        return in_array($v, $SMS_PARAMS, true);
    });
}
print_r($resultMap);