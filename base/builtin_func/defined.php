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

define("GREETING","Hello you! How are you today?");
echo defined("GREETING");