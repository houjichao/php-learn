<?php

/**
 * 定义和用法
 * array_search() 函数在数组中搜索某个键值，并返回对应的键名。
 *
 * 语法
 * array_search(value,array,strict)
 *
 * 参数    描述
 * value    必需。规定在数组中搜索的键值。
 * array    必需。规定被搜索的数组。
 * strict    可选。如果该参数被设置为 TRUE，则函数在数组中搜索数据类型和值都一致的元素。可能的值：
 * true
 * false - 默认
 * 如果设置为 true，则在数组中检查给定值的类型，数字 5 和字符串 5 是不同的（参见实例 2）。
 * 技术细节
 * 返回值：    如果在数组中找到指定的键值，则返回对应的键名，否则返回 FALSE。如果在数组中找到键值超过一次，则返回第一次找到的键值所匹配的键名。
 */

$a = array("a" => "red", "b" => "green", "c" => "blue");
echo array_search("red", $a) . "\n";
var_dump(array_search("black", $a));


$a = array("a" => "5", "b" => 5, "c" => "5");
echo array_search(5, $a) . "\n";
echo array_search(5, $a, true);

echo "-------\n";
$field = "l.leadTags";
$field = sprintf("COALESCE(%s,'[]')", $field);
echo $field;
$value = ["ifc_partner_application", "ifc_integrated_cooperaton", "ifc_certification_equipment", "ifc_tianlai_cooperation", "ifc_new_meeting_room", "ifc_retrofit_meeting_room"];
$con = sprintf("JSON_OVERLAPS('%s', %s)", json_encode($value, JSON_UNESCAPED_UNICODE), $field);
echo "-------\n";
echo $con;
