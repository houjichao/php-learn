<?php

/**
 * json_encode
 * PHP json_encode() 用于对变量进行 JSON 编码，该函数如果执行成功返回 JSON 数据，否则返回 FALSE 。
 *
 * 语法
 * string json_encode ( $value [, $options = 0 ] )
 */

$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
$str = json_encode($arr);
echo $str . "\n";
/**
 * json_decode
 * PHP json_decode() 函数用于对 JSON 格式的字符串进行解码，并转换为 PHP 变量。
 *
 * 语法
 * mixed json_decode ($json_string [,$assoc = false [, $depth = 512 [, $options = 0 ]]])
 * 参数
 * json_string: 待解码的 JSON 字符串，必须是 UTF-8 编码数据
 *
 * assoc: 当该参数为 TRUE 时，将返回数组，FALSE 时返回对象。
 *
 * depth: 整数类型的参数，它指定递归深度
 *
 * options: 二进制掩码，目前只支持 JSON_BIGINT_AS_STRING 。
 */
var_dump(json_decode($str));
var_dump(json_decode($str, true));