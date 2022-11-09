<?php

/**
 * ctype_digit()：检测字符串中的字符是否都为纯数组
 * 语法：
 *
 * ctype_digit($text);
 * 1
 * 参数：
 * $text：要检测的一个字符串
 * 返回值：
 * 如果 $text 中的所有字符都为纯数字，则返回 TRUE 否则返回 false
 */

$originParams = ["uin" => 123];
echo $originParams['uin'];
var_dump(empty($originParams['uin']));
var_dump(!ctype_digit($originParams['uin']));
if (empty($originParams['uin']) && !ctype_digit($originParams['uin'])) {
    echo "不是数字";
}