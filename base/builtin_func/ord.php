<?php
/**
 * ord() 函数返回字符串中第一个字符的 ASCII 值。
 *
 * 语法
 * ord(string)
 * 参数    描述
 * string    必需。要从中获得 ASCII 值的字符串。
 */

$a = "hello";
echo ord("h") . "\n";
echo ord($a) . "\n";
echo ord($a[0]) . "\n";