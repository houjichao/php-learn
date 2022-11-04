<?php

/**
 * 字符串学习
 */

/**
 * PHP 并置运算符
 * 在 PHP 中，只有一个字符串运算符。
 * 并置运算符 (.) 用于把两个字符串值连接起来。
 * 下面的实例演示了如何将两个字符串变量连接在一起：
 */
echo "<br>";
echo "------------以下是并置运算符------------------";
echo "<br>";

$txt1 = "Hello world!";
$txt2 = "What a nice day!";
echo $txt1 . "------" . $txt2;

echo "<br>";
echo "------------以下是strlen()函数------------------";
echo "<br>";

/**
 * strlen() 函数返回字符串的长度（字节数）。
 * mb_strlen() 函数返回字符串的长度（字符数）。
 */
echo strlen("Hello world!");
echo "<br>";
echo strlen("你好中国");
echo "<br>";
echo mb_strlen("你好中国");

echo "<br>";
echo "------------以下是strpos()函数------------------";
echo "<br>";

echo strpos("Hello world!","world");

