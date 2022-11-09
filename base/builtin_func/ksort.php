<?php

/**
 * ksort() 函数对关联数组按照键名进行升序排序。
 *
 * 提示：请使用 krsort() 函数对关联数组按照键名进行降序排序。
 *
 * 提示：请使用 asort() 函数对关联数组按照键值进行升序排序。
 *
 * 语法
 * ksort(array,sortingtype);
 *
 * 参数    描述
 * array    必需。规定要进行排序的数组。
 * sortingtype    可选。规定如何排列数组的元素/项目。可能的值：
 * 0 = SORT_REGULAR -默认。把每一项按常规顺序排列（Standard ASCII，不改变类型）。
 * 1 = SORT_NUMERIC - 把每一项作为数字来处理。
 * 2 = SORT_STRING - 把每一项作为字符串来处理。
 * 3 = SORT_LOCALE_STRING - 把每一项作为字符串来处理，基于当前区域设置（可通过 setlocale() 进行更改）。
 * 4 = SORT_NATURAL - 把每一项作为字符串来处理，使用类似 natsort() 的自然排序。
 * 5 = SORT_FLAG_CASE - 可以结合（按位或）SORT_STRING 或 SORT_NATURAL 对字符串进行排序，不区分大小写。
 * 技术细节
 * 返回值：    如果成功则返回 TRUE，如果失败则返回 FALSE。
 */

//ksort() 函数对关联数组按照键名进行 升序 排序。
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
ksort($age);
print_r($age);

//echo array_search("35", $age) . "\n";
echo end($age);

