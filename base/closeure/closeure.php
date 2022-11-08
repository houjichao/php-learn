<?php

/**
 * php的闭包（Closure）也就是匿名函数。是PHP5.3引入的。
 *
 * 闭包的语法很简单，需要注意的关键字就只有use，use意思是连接闭包和外界变量。
 *
 * $a =function()use($b) {
 * }
 */

$name = 'xiaochuan';
$test = function ($age = 10) use ($name) {
//这里的name 不是用的传递的名字 而是 use 中
    echo $name;
    echo '<br>';
    echo $age;
};
$test(20);