<?php

/**
 * array_chunk() 函数把一个数组分割为新的数组块。
 *
 * 语法
 * array_chunk(array,size,preserve_keys);
 *
 * 参数    描述
 * array    必需。规定要使用的数组。
 * size    必需。一个整数，规定每个新数组块包含多少个元素。
 * preserve_key    可选。可能的值：
 * true - 保留原始数组中的键名。
 * false - 默认。每个新数组块使用从零开始的索引。
 */

$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43", "Harry" => "50");

var_dump(sizeof($age));
echo "=========\n";

print_r(array_chunk($age, 2, true));
print_r(array_chunk($age, 2));

$arr = array_chunk($age, 2, true);
foreach ($arr as $arrTemp) {
    var_dump($arrTemp);
}
