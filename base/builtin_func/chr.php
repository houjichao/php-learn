<?php

/**
 * chr() 函数从指定 ASCII 值返回字符。
 *
 * ASCII 值可被指定为十进制值、八进制值或十六进制值。八进制值被定义为带前置 0，十六进制值被定义为带前置 0x。
 *
 * 语法
 * chr(ascii)
 *
 * 参数    描述
 * ascii    必需。ASCII 值。
 */

$str = chr(046);
echo("You $str me forever!");

echo "\n";

$str = chr(104);
echo $str;