<?php

/**
 * 魔术常量
 */

echo "<br>";
echo "------------魔术常量------------------";
echo "<br>";

//文件中的当前行号。
echo '__LINE__这是第 " ' . __LINE__ . ' " 行';
echo "<br>";


//文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。
echo '__FILE__该文件位于 " ' . __FILE__ . ' " ';
echo "<br>";

//文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。
echo '__DIR__该文件位于 " ' . __DIR__ . ' " ';
echo "<br>";


//__FUNCTION__ 函数名称
function test()
{
    echo '__FUNCTION__ 函数名为：' . __FUNCTION__;
}

test();
echo "<br>";


//__CLASS__类的名称
class test
{
    function _print()
    {
        echo '类名为：' . __CLASS__ . "<br>";
        echo '函数名为：' . __FUNCTION__;
    }
}

$t = new test();
$t->_print();
echo "<br>";

/**
 * Trait 的名字（PHP 5.4.0 新加）。自 PHP 5.4.0 起，PHP 实现了代码复用的一个方法，称为 traits。
 * Trait 名包括其被声明的作用区域（例如 Foo\Bar）。
 * 从基类继承的成员被插入的 SayWorld Trait 中的 MyHelloWorld 方法所覆盖。
 * 其行为 MyHelloWorld 类中定义的方法一致。优先顺序是当前类中的方法会覆盖 trait 方法，而 trait 方法又覆盖了基类中的方法。
 */
class Base
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}

trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base
{
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
echo "<br>";


//函数名
function test1()
{
    echo '函数名为：' . __METHOD__;
}

test1();
echo "<br>";


echo '命名空间为："', __NAMESPACE__, '"';
echo "<br>";

echo "__FUNCTION__ 和 __METHOD__ 的区别:";
echo "<br>";

class Test1{
    public function doit(){
        echo __FUNCTION__;
    }

    public function doitAgain(){
        echo __METHOD__;
    }
}
$obj = new Test1();
$obj->doit();
echo '<br>';
$obj->doitAgain();