<?php

/**
 * 定义和用法
 * array_unique() 函数用于移除数组中重复的值。如果两个或更多个数组值相同，只保留第一个值，其他的值被移除。
 *
 * 注释：被保留的数组将保持第一个数组项的键名类型。
 *
 * 语法
 * array_unique(array)
 *
 * 参数    描述
 * array    必需。规定数组。
 * sortingtype    可选。规定排序类型。可能的值：
 * SORT_STRING - 默认。把每一项作为字符串来处理。
 * SORT_REGULAR - 把每一项按常规顺序排列（Standard ASCII，不改变类型）。
 * SORT_NUMERIC - 把每一项作为数字来处理。
 * SORT_LOCALE_STRING - 把每一项作为字符串来处理，基于当前区域设置（可通过 setlocale() 进行更改）。
 */

$a = array("a" => "red", "b" => "green", "c" => "red");

$b = array_unique($a);
print_r($b);