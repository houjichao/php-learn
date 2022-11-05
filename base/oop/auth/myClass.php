<?php


/**
 * 访问控制
 * PHP 对属性或方法的访问控制，是通过在前面添加关键字 public（公有），protected（受保护）或 private（私有）来实现的。
 *
 * public（公有）：公有的类成员可以在任何地方被访问。
 * protected（受保护）：受保护的类成员则可以被其自身以及其子类和父类访问。
 * private（私有）：私有的类成员则只能被其定义所在的类访问。
 */
class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass();
echo $obj->public; // 这行能被正常执行
//echo $obj->protected; // 这行会产生一个致命错误
//echo $obj->private; // 这行也会产生一个致命错误
$obj->printHello(); // 输出 Public、Protected 和 Private