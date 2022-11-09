<?php

/**
 * 定义和用法
 * array_diff() 函数用于比较两个（或更多个）数组的值，并返回差集。
 *
 * 该函数比较两个（或更多个）数组的值（key=>value 中的 value），并返回一个差集数组，该数组包括了所有在被比较的数组（array1）中，但是不在任何其他参数数组（array2 或 array3 等等）中的值。
 *
 * 语法
 * array_diff(array1,array2,array3...);
 *
 * 参数    描述
 * array1    必需。与其他数组进行比较的第一个数组。
 * array2    必需。与第一个数组进行比较的数组。
 * array3,...    可选。与第一个数组进行比较的其他数组。
 * 技术细节
 * 返回值：    返回一个差集数组，该数组包括了所有在被比较的数组（array1）中，但是不在任何其他参数数组（array2 或 array3 等等）中的值。
 */

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue");

$result = array_diff($a1, $a2);
print_r($result);