<?php

/**
 * 命名空间学习
 *
 * PHP 命名空间可以解决以下两类问题：
 *
 * 用户编写的代码与PHP内部的类/函数/常量或第三方类/函数/常量之间的名字冲突。
 * 为很长的标识符名称(通常是为了缓解第一类问题而定义的)创建一个别名（或简短）的名称，提高源代码的可读性。
 */

/**
 * 定义命名空间
 * 默认情况下，所有常量、类和函数名都放在全局空间下，就和PHP支持命名空间之前一样。*
 *
 * 命名空间通过关键字namespace 来声明。如果一个文件中包含命名空间，它必须在其它所有代码之前声明命名空间。语法格式如下；
 * <?php
 * // 定义代码在 'MyProject' 命名空间中
 * namespace MyProject;
 * // ... 代码 ...
 */
//declare(encoding='UTF-8'); //定义多个命名空间和不包含在命名空间中的代码
namespace Foo\Bar;

use Foo\Bar\subnamespace;

include "quote/quote.php";

const FOO = 2;
function foo() {}
class foo
{
    static function staticmethod() {}
}

/* 非限定名称 */
foo(); // 解析为函数 Foo\Bar\foo
foo::staticmethod(); // 解析为类 Foo\Bar\foo ，方法为 staticmethod
echo FOO; // 解析为常量 Foo\Bar\FOO

/* 限定名称 */
subnamespace\foo(); // 解析为函数 Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // 解析为类 Foo\Bar\subnamespace\foo,
// 以及类的方法 staticmethod
echo subnamespace\FOO; // 解析为常量 Foo\Bar\subnamespace\FOO

/* 完全限定名称 */
\Foo\Bar\foo(); // 解析为函数 Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // 解析为类 Foo\Bar\foo, 以及类的方法 staticmethod
echo \Foo\Bar\FOO; // 解析为常量 Foo\Bar\FOO