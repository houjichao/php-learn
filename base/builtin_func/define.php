<?php

/**
 * 定义和用法
 * defined() 函数检查某常量是否存在。
 *
 * 语法
 * defined(name)
 *
 * 参数    描述
 * name    必需。规定要检查的常量的名称。
 * 技术细节
 * 返回值：    如果常量存在，则返回 TRUE，否则返回 FALSE。
 */

/**
 * 格式
 *
 * define ( string $name   , mixed $value   , bool $case_insensitive = false   )
 * $name:常规名称。
 *
 * $value:常量值；在PHP5中，value必须是标准值(int、float、string、boolean、null)，也可以是PHP7中的array值。
 *
 * $case_insensitive:如果设定为true，则大小写不敏感。默认情况下，大小写很敏感。PHP7.3.0废弃了定义大小写不敏感的常量。
 *
 * 返回值:成功时返回true，失败时返回false。
 */
define("GREETING", "Hello you! How are you today?");
echo constant("GREETING");

$str = "";
var_dump(empty($str));