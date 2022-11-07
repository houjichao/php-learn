<?php

/**
 * 内置函数 -- array_map学习
 *
 * array_map() 函数将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新的值的数组。
 *
 * 提示：您可以向函数输入一个或者多个数组。
 *
 * 语法
 * array_map(myfunction,array1,array2,array3...)
 * 参数    描述
 * myfunction    必需。用户自定义函数的名称，或者是 null。
 * array1    必需。规定数组。
 * array2    可选。规定数组。
 * array3    可选。规定数组。
 */

function ToUpper($value) {
    return strtoupper($value);
}

$a = array("Animal" => "horse", "Type" => "mammal");

$b = array_map(function ($v) {
    return strtoupper($v);
},$a);

//print_r(array_map("ToUpper",$a));
print_r($b);

print ("\n----------\n");
$a1=array("Horse","Dog","Cat");
$a2=array("Cow","Dog","Rat");
$a3 = array_map(function ($v1,$v2) {
    if ($v1 == $v2) {
        return "same";
    }
    return "different";
},$a1,$a2);
print_r($a3);
print ("\n----------\n");


//将函数为null时
$a1=array("Dog","Cat");
$a2=array("Puppy","Kitten");
print_r(array_map(null,$a1,$a2));