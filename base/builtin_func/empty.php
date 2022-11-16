<?php

/**
 * empty() 函数用于检查一个变量是否为空。
 * empty() 判断一个变量是否被认为是空的。当一个变量并不存在，或者它的值等同于 FALSE，那么它会被认为不存在。如果变量不存在的话，empty()并不会产生警告。
 * empty() 5.5 版本之后支持表达式了，而不仅仅是变量。
 *
 * 语法
 * bool empty ( mixed $var )
 * 参数说明：
 *
 * $var：待检查的变量。
 * 注意：在 PHP 5.5 之前，empty() 仅支持变量；任何其他东西将会导致一个解析错误。换言之，下列代码不会生效：
 *
 * empty(trim($name))
 * 作为替代，应该使用:
 *
 * trim($name) == false
 * empty() 并不会产生警告，哪怕变量并不存在。 这意味着 empty() 本质上与 !isset($var) || $var == false 等价。
 *
 * 返回值
 * 当 var 存在，并且是一个非空非零的值时返回 FALSE 否则返回 TRUE。
 *
 * 以下的变量会被认为是空的：
 * "" (空字符串)
 * 0 (作为整数的0)
 * 0.0 (作为浮点数的0)
 * "0" (作为字符串的0)
 * NULL
 * FALSE
 * array() (一个空数组)
 * $var; (一个声明了，但是没有值的变量)
 */
//false会被认为是空的
//所以判断bool型的参数是否为空或者是否设置时，不要用empty，可以用isset函数
$arg1 = false;
var_dump(empty($arg1));
$arg2 = "";
var_dump(empty($arg2));
var_dump(empty(array()));
