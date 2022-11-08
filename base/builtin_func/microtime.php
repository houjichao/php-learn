<?php
/**
 * microtime() 函数返回当前 Unix 时间戳的微秒数。
 *
 * 语法
 * microtime(get_as_float);
 * 参数    描述
 * get_as_float    可选。当设置为 TRUE 时，规定函数应该返回一个浮点数，否则返回一个字符串。默认为 FALSE。
 */

echo microtime(true);
echo microtime();