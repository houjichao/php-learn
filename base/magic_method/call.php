<?php

/**
 * __call 是魔术方法中的一个，当程序调用到当前类中未声明或没权限调用的方法时，就会调用 __call 方法。
 */


class Person
{
    var $varName = "111";

    function say()
    {
        echo "Hello World\n";
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo "你所调用的函数:" . $name . "（参数：";
        print_r($arguments);
        echo "）不存在\n";
    }
}

$person = new Person();
$person->run("teacher");
$person->eat("苹果", "香蕉");
$person->say();
echo $person->varName;
