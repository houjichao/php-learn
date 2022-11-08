<?php

/**
 * 定义和用法
 * in_array() 函数搜索数组中是否存在指定的值。
 *
 * 语法
 * bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
 * 参数    描述
 * needle    必需。规定要在数组搜索的值。
 * haystack    必需。规定要搜索的数组。
 * strict    可选。如果该参数设置为 TRUE，则 in_array() 函数检查搜索的数据与数组的值的类型是否相同。
 */

$people = array("name1" => "Peter", "Joe", "Glenn", "Cleveland", 23);
var_dump($people);

if (in_array("23", $people, TRUE)) {
    echo "Match found<br>";
} else {
    echo "Match not found<br>";
}
if (in_array("Glenn", $people, TRUE)) {
    echo "Match found<br>";
} else {
    echo "Match not found<br>";
}

if (in_array(23, $people, TRUE)) {
    echo "Match found<br>";
} else {
    echo "Match not found<br>";
}

if (in_array("name1", $people, TRUE)) {
    echo "Match found<br>";
} else {
    echo "Match not found<br>";
}
