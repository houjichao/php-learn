<?php
/**
 * var_export() 函数用于输出或返回一个变量，以字符串形式表示。
 * var_export() 函数返回关于传递给该函数的变量的结构信息，它和 var_dump() 类似，不同的是其返回的是一个合法的 PHP 代码。
 *
 *
 * 语法
 * mixed var_export ( mixed $expression [, bool $return ] )
 * 参数说明：
 *
 * $expression: 你要输出的变量。
 * $return: 可选，如果设置为 TRUE，该函数不会执行输出结果，而且将输出结果返回给一个变量。
 * 返回值
 * $return 设置为 true 时才有返回值，返回变量的结构信息。
 */

$a = array (1, 2, array ("a", "b", "c"));
var_export ($a);

$b = 3.1;
$v = var_export($b,true);
var_dump($v);


$total = 0;
if ("111" == 111) {
    $total = 2;
}
var_dump($total);

$rowArr = explode(' ', "10:22:44");
echo $rowArr[1];