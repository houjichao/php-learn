<?php

/**
 * 定义和用法
 * array_merge_recursive() 函数用于把一个或多个数组合并为一个数组。
 *
 * 该函数与 array_merge() 函数之间的不同是在处理两个或更多个数组元素有相同的键名的情况。array_merge_recursive() 不会进行键名覆盖，而是将多个相同键名的值递归组成一个数组。
 *
 * 注释：如果您仅仅向 array_merge_recursive() 函数输入一个数组，结果与 array_merge() 相同，函数将返回带有整数键名的新数组，其键名以 0 开始进行重新索引。
 *
 * 语法
 * array_merge_recursive(array1,array2,array3...)
 *
 * 参数    描述
 * array1    必需。规定数组。
 * array2    可选。规定数组。
 * array3    可选。规定数组。
 */

$a1=array("a"=>"red","b"=>"green");
$a2=array("c"=>"blue","b"=>"yellow");
$a3=[];
print_r(array_merge_recursive($a1,$a2));
print_r(array_merge($a1,$a2));
print_r(array_merge_recursive($a1,$a3));
