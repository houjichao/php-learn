<?php

/**
 * 定义和用法
 * array_filter() 函数用回调函数过滤数组中的元素。
 *
 * 该函数把输入数组中的每个键值传给回调函数。如果回调函数返回 true，则把输入数组中的当前键值返回给结果数组。数组键名保持不变。
 *
 * 语法
 * array array_filter ( array $array [, callable $callback [, int $flag = 0 ]] )
 * 参数    描述
 * array    必需。规定要过滤的数组。
 * callback    可选。规定要用的回调函数。
 * flag
 * 可选。决定 callback 接收的参数形式:
 * ARRAY_FILTER_USE_KEY - callback 接受键名作为的唯一参数
 * ARRAY_FILTER_USE_BOTH - callback 同时接受键名和键值
 */

/**
 * 比较简单的理解：
 * 回调函数返回true,保留此元素，否则丢弃
 * 如果回调函数为空，则把空、null的丢弃
 */
function test_odd($var)
{
    return ($var & 1);
}

$a1 = array("a", "b", 2, 3, 4, "",null);
print_r(array_filter($a1, "test_odd"));

print_r(array_filter($a1));