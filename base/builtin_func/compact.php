<?php

/**
 * 内置函数 -- compact学习
 * compact() 函数创建一个包含变量名和它们的值的数组。
 * 注释：任何没有变量名与之对应的字符串都被略过。
 */
//忽略 PHP提示Notice: Undefined variable
error_reporting(E_ALL & ~E_NOTICE);

$firstname = "Peter";
$lastname = "Griffin";
$age = "41";

$name = array("firstname", "lastname");
$result = compact($name, "location", "age");

print_r($result);

$customerId = "1111";
var_dump(compact("customerId"));
