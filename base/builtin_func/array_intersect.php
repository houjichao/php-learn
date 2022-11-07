<?php

/**
 * 定义和用法
 * array_intersect() 函数用于比较两个（或更多个）数组的值，并返回交集。
 *
 * 该函数比较两个（或更多个）数组的值，并返回一个交集数组，该数组包含了所有在 array1 中也同时出现在所有其它参数数组中的值。。
 *
 * 语法
 * array_intersect(array1,array2,array3...);
 *
 * 参数    描述
 * array1    必需。与其他数组进行比较的第一个数组。
 * array2    必需。与第一个数组进行比较的数组。
 * array3,...    可选。与第一个数组进行比较的其他数组。
 */

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue");
$a3 = array_intersect($a1, $a2);
var_dump($a3);

$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"black","g"=>"purple");
$a3=array("a"=>"red","b"=>"black","h"=>"yellow");

$result=array_intersect($a1,$a2,$a3);
print_r($result);

