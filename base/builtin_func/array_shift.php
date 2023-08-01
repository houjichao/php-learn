<?php

/**
 * 删除数组中的第一个元素（red），并返回被删除的元素：
 */
$a = array("a" => "red", "b" => "green", "c" => "blue");
echo array_shift($a) . "\n";
//print_r($a);

$str  = "111";
$arr = [$str];
var_dump($arr);