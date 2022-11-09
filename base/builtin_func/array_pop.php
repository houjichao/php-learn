<?php

/**
 * array_pop() 函数删除数组中的最后一个元素。
 *
 * 语法
 * array_pop(array)
 *
 * 参数    描述
 * array    必需。规定数组。
 * 技术细节
 * 返回值：    返回数组的最后一个值。如果数组是空的，或者不是一个数组，将返回 NULL。
 */

$a = array("color1" => "red", "color2" => "green", "color3" => "blue");
$b = array_pop($a);
print_r($b);
print_r("\n");
print_r($a);