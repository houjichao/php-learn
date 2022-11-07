<?php

/**
 * array_walk() 函数对数组中的每个元素应用用户自定义函数。在函数中，数组的键名和键值是参数。
 *
 * 注释：您可以通过把用户自定义函数中的第一个参数指定为引用：&$value，来改变数组元素的值（参见实例 2）。
 * 提示：如需操作更深的数组（一个数组中包含另一个数组），请使用 array_walk_recursive() 函数。
 *
 * 语法
 * array_walk(array,myfunction,parameter...)
 * 参数    描述
 * array    必需。规定数组。
 * myfunction    必需。用户自定义函数的名称。
 * parameter,...    可选。规定用户自定义函数的参数，您可以为函数设置一个或多个参数。
 */

//带参数
$a = array("a" => "red", "b" => "green", "c" => "blue");
$b = array_walk($a, function ($value, $key, $p) {
    echo "$key $p $value<br>";
}, "has the value");
echo $b;

//改变数组元素的值（请注意 &$value）：
array_walk($a, function (&$value, $key) {
    $value = "yellow";
});
print_r($a);
