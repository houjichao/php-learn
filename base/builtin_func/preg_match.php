<?php

/**
 * preg_match 函数用于执行一个正则表达式匹配。
 *
 * 语法
 * int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )
 * 搜索 subject 与 pattern 给定的正则表达式的一个匹配。
 *
 * 参数说明：
 * $pattern: 要搜索的模式，字符串形式。
 * $subject: 输入字符串。
 * $matches: 如果提供了参数matches，它将被填充为搜索结果。 $matches[0]将包含完整模式匹配到的文本， $matches[1] 将包含第一个捕获子组匹配到的文本，以此类推。
 * $flags：flags 可以被设置为以下标记值：
 * PREG_OFFSET_CAPTURE: 如果传递了这个标记，对于每一个出现的匹配返回时会附加字符串偏移量(相对于目标字符串的)。 注意：这会改变填充到matches参数的数组，使其每个元素成为一个由 第0个元素是匹配到的字符串，第1个元素是该匹配字符串 在目标字符串subject中的偏移量。
 * offset: 通常，搜索从目标字符串的开始位置开始。可选参数 offset 用于 指定从目标字符串的某个未知开始搜索(单位是字节)。
 * 返回值
 * 返回 pattern 的匹配次数。 它的值将是 0 次（不匹配）或 1 次，因为 preg_match() 在第一次匹配后 将会停止搜索。preg_match_all() 不同于此，它会一直搜索subject 直到到达结尾。 如果发生错误preg_match()返回 FALSE。
 */

// 从URL中获取主机名称
preg_match('@^(?:http://)?([^/]+)@i',
    "http://www.runoob.com/index.html", $matches);
$host = $matches[1];

// 获取主机名称的后面两部分
$result = preg_match('/[^.]+\.[^.]+$/', $host, $matches);
echo "domain name is: {$matches[0]}\n";
var_dump($result);