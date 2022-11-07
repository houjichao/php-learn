<?php

/**
 * 定义和用法
 * explode() 函数使用一个字符串分割另一个字符串，并返回由字符串组成的数组。
 * 注释："separator" 参数不能是一个空字符串。
 * 注释：该函数是二进制安全的。
 *
 * 语法
 * explode(separator,string,limit)
 * 参数    描述
 * separator    必需。规定在哪里分割字符串。
 * string    必需。要分割的字符串。
 * limit    可选。规定所返回的数组元素的数目。
 * 可能的值：
 * 大于 0 - 返回包含最多 limit 个元素的数组
 * 小于 0 - 返回包含除了最后的 -limit 个元素以外的所有元素的数组
 * 0 - 会被当做 1, 返回包含一个元素的数组
 */

$str = "one,tow,three,four";

//  返回包含一个元素的数组
print_r(explode(",", $str, 0));

print("\n");

// 数组元素为 2
print_r(explode(",", $str, 2));

print("\n");

//删除最后一个数组元素
print_r(explode(",", $str, -1));

print("\n");
//正常切割返回
print_r(explode(",", $str));

/*
 * 打印结果
Array
(
    [0] => one,tow,three,four
)

Array
(
    [0] => one
    [1] => tow,three,four
)

Array
(
    [0] => one
    [1] => tow
    [2] => three
)

Array
(
    [0] => one
    [1] => tow
    [2] => three
    [3] => four
)
 */
