<?php
/**
 * 定义和用法
 * addslashes() 函数返回在预定义的字符前添加反斜杠的字符串。
 *
 * 预定义字符是：
 *
 * 单引号（'）
 * 双引号（"）
 * 反斜杠（\）
 * NULL
 * 提示：该函数可用于为存储在数据库中的字符串以及数据库查询语句准备合适的字符串。
 */

$str = "Who's Peter Griffin?";
echo $str . " This is not safe in a database query.<br>" . "\n";
echo addslashes($str) . " This is safe in a database query.";
echo "\n";
$str = addslashes('What does "yolo" mean?');
echo($str);


