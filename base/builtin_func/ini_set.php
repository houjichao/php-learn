<?php

/**
 * 函数简介
 *
 * PHP ini_set用来设置php.ini的值，在函数执行的时候生效，脚本结束后，设置失效。无需打开php.ini文件，就能修改配置，对于虚拟空间来说，很方便。
 *
 * 函数格式：string ini_set(string $varname, string $newvalue)
 *
 * 作用域
 *
 * PHP总共有4个配置指令作用域：（PHP中的每个指令都有自己的作用域，指令只能在其作用域中修改，不是任何地方都能修改配置指令的）
 *
 * PHP_INI_PERDIR：指令可以在php.ini、httpd.conf或.htaccess文件中修改
 *
 * PHP_INI_SYSTEM：指令可以在php.ini 和 httpd.conf 文件中修改
 *
 * PHP_INI_USER：指令可以在用户脚本中修改
 *
 * PHP_INI_ALL：指令可以在任何地方修改
 * ————————————————
 * 版权声明：本文为CSDN博主「秋水sir」的原创文章，遵循CC 4.0 BY-SA版权协议，转载请附上原文出处链接及本声明。
 * 原文链接：https://blog.csdn.net/qq_35569814/article/details/101019333
 */

//@符号代表不输出错误

//设定一个脚本所能够申请到的最大内存字节数，这有利于写的不好的脚本消耗服务器上的可用内存。
@ini_set('memory_limit', '64M');