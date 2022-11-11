<?php

/**
 * 多维数组
 */

/**
 * 多维数组是包含一个或多个数组的数组。
 *
 * 在多维数组中，主数组中的每一个元素也可以是一个数组，子数组中的每一个元素也可以是一个数组。
 *
 * 一个数组中的值可以是另一个数组，另一个数组的值也可以是一个数组，依照这种方式，我们可以创建二维或者三维数组。
 *
 * 二维数组语法格式：
 *
 * array (
 * array (elements...),
 * array (elements...),
 * ...
 * )
 */
$cars = array(array("Vovlo", 100, 96), array("BMW", 60, 59), array("Toyota", 110, 90));
var_dump($cars);
echo "----\n";
echo $cars[0][1] . "\n";
echo "-----\n";

$sites = array
(
    "runoob" => array
    (
        "菜鸟教程",
        "http://www.runoob.com"
    ),
    "google" => array
    (
        "Google 搜索",
        "http://www.google.com"
    ),
    "taobao" => array
    (
        "淘宝",
        "http://www.taobao.com"
    )
);
echo $sites["runoob"][1] . "\n";

echo "-----------\n";

/**
 * 三维数组
 */
$myArr = [[[1, 2, 3], [11, 22, 33], [111, 222, 333]]];
print_r($myArr);




