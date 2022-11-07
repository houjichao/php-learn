<?php

/**
 * 三元运算符
 * 语法格式
 * (expr1) ? (expr2) : (expr3)
 * 对 expr1 求值为 TRUE 时的值为 expr2，在 expr1 求值为 FALSE 时的值为 expr3。
 */


$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
echo $username, PHP_EOL;

$_GET = array("user" => "jack");
// PHP 5.3+ 版本写法
$username = $_GET['user'] ?: 'nobody';
echo $username, PHP_EOL;

//在 PHP7+ 版本多了一个 NULL 合并运算符 ??，实例如下：
// 如果 $_GET['user'] 不存在返回 'nobody'，否则返回 $_GET['user'] 的值
$_GET = null;
$username = $_GET['user'] ?? 'nobody';
echo $username, PHP_EOL;