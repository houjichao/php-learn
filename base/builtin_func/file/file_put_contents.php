<?php

/*
 * 定义和用法
file_put_contents() 函数把一个字符串写入文件中。

该函数访问文件时，遵循以下规则：

如果设置了 FILE_USE_INCLUDE_PATH，那么将检查 *filename* 副本的内置路径
如果文件不存在，将创建一个文件
打开文件
如果设置了 LOCK_EX，那么将锁定文件
如果设置了 FILE_APPEND，那么将移至文件末尾。否则，将会清除文件的内容
向文件中写入数据
关闭文件并对所有文件解锁
如果成功，该函数将返回写入文件中的字符数。如果失败，则返回 False。

语法
int file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] )
参数	描述
filename	必需。规定要写入数据的文件。如果文件不存在，则创建一个新文件。
data	必需。规定要写入文件的数据。可以是字符串、数组或数据流。
flags	可选。规定如何打开/写入文件。可能的值：
FILE_USE_INCLUDE_PATH
FILE_APPEND
LOCK_EX
context	可选。规定文件句柄的环境。context 是一套可以修改流的行为的选项。

提示和注释
注释：请使用 FILE_APPEND 避免删除文件中已存在的内容。

其他文件函数：
https://www.runoob.com/php/php-ref-filesystem.html
 */

$file = 'sites.txt';

$site = "\nGoogle";
// 向文件追加写入内容
// 使用 FILE_APPEND 标记，可以在文件末尾追加内容
//  LOCK_EX 标记可以防止多人同时写入
file_put_contents($file, $site, FILE_APPEND | LOCK_EX);

