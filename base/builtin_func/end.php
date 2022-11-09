<?php

/**
 * 定义和用法
 * end() 函数将内部指针指向数组中的最后一个元素，并输出。
 *
 * 相关的方法：
 *
 * current() - 返回数组中的当前元素的值。
 * next() - 将内部指针指向数组中的下一个元素，并输出。
 * prev() - 将内部指针指向数组中的上一个元素，并输出。
 * reset() - 将内部指针指向数组中的第一个元素，并输出。
 * each() - 返回当前元素的键名和键值，并将内部指针向前移动。
 * 语法
 * end(array)
 *
 * 参数    描述
 * array    必需。规定要使用的数组。
 * 技术细节
 * 返回值：    如果成功则返回数组中最后一个元素的值，如果数组为空则返回 FALSE。
 */
$people = array("name1" => "Peter", "name2" => "Joe", "name3" => "Glenn", "name4" => "Cleveland");

echo current($people) . "\n";
echo end($people);